<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LeadSubmissionController extends Controller
{
    public function store(Request $request)
    {
        Log::info('LeadSubmissionController@store called', $request->all());

        $validated = $request->validate([
            'sel-year' => 'required|integer',
            'sel-make' => 'required|string',
            'sel-model' => 'required|string',
            'car_mileage' => 'required|string',
            'user-state' => 'required|string',
            'email' => 'required|email',
            'user-name' => 'required|string',
            'user-number' => 'required|string',
        ]);

        Log::info('Validation passed', $validated);

        [$firstName, $lastName] = $this->splitName($validated['user-name']);
        $stateCode = strtoupper($validated['user-state']);
        $zipCode = config("zipcodes.{$stateCode}", config('zipcodes.default'));
        $mileageValue = $this->convertMileageToNumeric($validated['car_mileage']);

        $payload = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'state' => $stateCode,
            'zipCode' => $zipCode,
            'phone' => $validated['user-number'],
            'email' => $validated['email'],
            'year' => (int) $validated['sel-year'],
            'make' => $validated['sel-make'],
            'model' => $validated['sel-model'],
            'mileage' => $mileageValue,
            'smsOptIn' => true,
        ];

        Log::info('Prepared Endurance payload', $payload);

        $finalDestination = 'System Error';
        $finalMessage = 'Failed to submit lead due to a system error';

        try {
            // -------------------------------
            // 1️⃣ Send to Endurance
            // -------------------------------
            $enduranceResponse = Http::withHeaders([
                'Content-Type' => 'application/json-patch+json',
            ])->withBasicAuth('CHAIZ-INT-chaizcwhp', 'NqkTOZ2vJBEi3cpn')
                ->post('https://leadsubmission.enduranceapi.com/api/v1/leads', $payload);

            Log::info('Endurance API response', [
                'status' => $enduranceResponse->status(),
                'body' => $enduranceResponse->body(),
            ]);

            $enduranceIsDuplicate = false;
            if ($enduranceResponse->successful()) {
                $finalDestination = 'Endurance';
                $finalMessage = 'Your lead has been successfully submitted to Endurance.';
            } else {
                $responseBody = json_decode($enduranceResponse->body(), true);
                if ($enduranceResponse->status() === 400 && isset($responseBody['errorCode']) && $responseBody['errorCode'] === 970) {
                    $enduranceIsDuplicate = true;
                    Log::info('Duplicate lead detected in Endurance');
                }

                // -------------------------------
                // 2️⃣ Fallback to LeadConduit
                // -------------------------------
                $leadConduitPayload = [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'state' => $stateCode,
                    'zipCode' => $zipCode,
                    'phone_1' => $validated['user-number'],
                    'email' => $validated['email'],
                    'year' => $validated['sel-year'],
                    'make' => $validated['sel-make'],
                    'model' => $validated['sel-model'],
                    'mileage' => $mileageValue,
                    'lead_type_adap' => 'E',
                    'umid_adap' => bin2hex(random_bytes(6)),
                    'umid2_adap' => bin2hex(random_bytes(6)),
                    'company.name' => "Null",
                ];

                Log::info('Prepared LeadConduit payload', $leadConduitPayload);

                $leadConduitResponse = Http::asForm()->post(
                    'https://app.leadconduit.com/flows/65832665b40f680b034dae9b/sources/68471ebce9693c54cfa25e07/submit',
                    $leadConduitPayload
                );

                Log::info('LeadConduit API response', [
                    'status' => $leadConduitResponse->status(),
                    'body' => $leadConduitResponse->body(),
                ]);

                $leadConduitIsDuplicate = false;
                $fallbackBody = json_decode($leadConduitResponse->body(), true);
                if (
                    isset($fallbackBody['outcome'], $fallbackBody['reason']) &&
                    $fallbackBody['outcome'] === 'failure' &&
                    stripos($fallbackBody['reason'], 'duplicate') !== false
                ) {
                    $leadConduitIsDuplicate = true;
                    Log::info('Duplicate lead detected in LeadConduit');
                }

                if ($enduranceIsDuplicate && $leadConduitIsDuplicate) {
                    $finalDestination = 'Already Submitted Previously';
                    $finalMessage = 'This lead has been submitted previously to both our primary and backup systems.';
                } else {
                    $finalDestination = 'American Dream';
                    $finalMessage = 'Your lead has been submitted via our backup system.';
                }
            }

            // -------------------------------
            // 3️⃣ Always send to Partner Lead API
            // -------------------------------
            try {
                $partnerPayload = [
                    'partner' => 'Comparewarranties',
                    'transactionId' => (string) Str::uuid(),
                    'utmParameters' => 'utm_source=partner&utm_medium=cps&utm_campaign=lead-gen',
                    'lead' => [
                        'email' => $validated['email'],
                        'firstName' => $firstName,
                        'lastName' => $lastName,
                    ],
                    'vehicle' => [
                        'state' => $stateCode,
                        'mileage' => $mileageValue,
                        'make' => $validated['sel-make'],
                        'model' => $validated['sel-model'],
                        'year' => (int) $validated['sel-year'],
                    ],
                ];

                Log::info('Prepared Partner Lead API payload', $partnerPayload);

                $partnerResponse = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('PARTNER_API_TOKEN'),
                    'Content-Type' => 'application/json',
                ])->post('https://chaiz-api.azurewebsites.net/api/v2/Partners/Lead', $partnerPayload);

                Log::info('Partner Lead API response', [
                    'status' => $partnerResponse->status(),
                    'body' => $partnerResponse->body(),
                ]);
            } catch (\Exception $e) {
                Log::error('Partner Lead API submission failed', ['message' => $e->getMessage()]);
            }


            // -------------------------------
            // 4️⃣ Set session and return response
            // -------------------------------
            session()->put('lead_already_submitted', true);
            session()->put('lead_destination', $finalDestination);

            return response()->json([
                'success' => true,
                'message' => $finalMessage,
                'destination' => $finalDestination,
            ]);
        } catch (\Exception $e) {
            Log::error('Submission exception occurred', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to submit lead due to a system error: ' . $e->getMessage(),
                'destination' => 'System Error',
            ]);
        }
    }

    /**
     * Convert mileage range to numeric value
     */
    private function convertMileageToNumeric(string $mileageRange): int
    {
        return match ($mileageRange) {
            'less-than-100k' => 75000,
            '100k-140k' => 120000,
            '140k-200k' => 170000,
            'more-than-200k' => 225000,
            default => 100000,
        };
    }

    /**
     * Split full name into first and last name
     */
    private function splitName(string $fullName): array
    {
        $parts = explode(' ', $fullName, 2);
        return [
            ucfirst($parts[0] ?? ''),
            ucfirst($parts[1] ?? ''),
        ];
    }
}
