<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadSubmissionController extends Controller
{
    public function store(Request $request)
    {
        Log::info('LeadSubmissionController@store called');
        Log::info('Request data:', $request->all());

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

        Log::info('Validation passed:', $validated);

        $nameParts = explode(' ', $validated['user-name'], 2);
        $firstName = ucfirst($nameParts[0] ?? '');
        $lastName = ucfirst($nameParts[1] ?? '');

        // Get zip code from config based on state
        $stateCode = strtoupper($validated['user-state']);
        $zipCode = config("zipcodes.{$stateCode}", config('zipcodes.default'));

        Log::info("Using zip code {$zipCode} for state {$stateCode}");

        // Convert mileage range to numeric value for API
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

        Log::info('Endurance payload prepared:', $payload);

        $url = 'https://leadsubmission.enduranceapi.com/api/v1/leads';

        $enduranceIsDuplicate = false;
        $leadConduitIsDuplicate = false;

        try {
            Log::info('Attempting to send to Endurance API...');

            $response = Http::withHeaders([
                'Content-Type' => 'application/json-patch+json',
            ])
                ->withBasicAuth('CHAIZ-INT-chaizcwhp', 'NqkTOZ2vJBEi3cpn')
                ->post($url, $payload);

            Log::info('Endurance API response status: ' . $response->status());
            Log::info('Endurance API response body: ' . $response->body());
            Log::info('Endurance API response headers:', $response->headers());

            $chaizData = [
                'make' => strtolower($validated['sel-make']),
                'model' => strtolower($validated['sel-model']),
                'year' => (int) $validated['sel-year'],
                'state' => $stateCode,
                'mileage' => $mileageValue,
                'userId' => '96d8841b-6ae6-4cb6-9b43-401662e25560'
            ];

            session()->flash('chaiz_search_data', $chaizData);

            if ($response->successful()) {
                Log::info('Lead successfully sent to Endurance');

                session()->put('lead_already_submitted', true);
                session()->put('lead_destination', 'Endurance');

                return response()->json([
                    'success' => true,
                    'message' => 'Your lead has been successfully submitted to Endurance for processing. You should receive a response shortly.',
                    'destination' => 'Endurance'
                ]);
            } else {
                // Check if it's a duplicate lead in Endurance
                $responseBody = json_decode($response->body(), true);
                if ($response->status() === 400 && isset($responseBody['errorCode']) && $responseBody['errorCode'] === 970) {
                    Log::info('Duplicate lead detected in Endurance, will try LeadConduit');
                    $enduranceIsDuplicate = true;
                } else {
                    Log::warning('Endurance API failed (non-duplicate error), attempting fallback to LeadConduit');
                    Log::warning('Endurance failure reason:', [
                        'status' => $response->status(),
                        'body' => $response->body()
                    ]);
                }

                // Always try LeadConduit as fallback
                $fallbackUrl = 'https://app.leadconduit.com/flows/65832665b40f680b034dae9b/sources/68471ebce9693c54cfa25e07/submit';

                // Generate random UMIDs
                $umid_adap = bin2hex(random_bytes(6));
                $umid2_adap = bin2hex(random_bytes(6));

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
                    'umid_adap' => $umid_adap,
                    'umid2_adap' => $umid2_adap,
                    'company.name' => "Null",
                ];

                Log::info('LeadConduit payload prepared:', $leadConduitPayload);
                Log::info('Attempting to send to LeadConduit...');

                $fallbackResponse = Http::asForm()->post($fallbackUrl, $leadConduitPayload);

                Log::info('LeadConduit API response status: ' . $fallbackResponse->status());
                Log::info('LeadConduit API response body: ' . $fallbackResponse->body());

                if ($fallbackResponse->successful()) {
                    // Check LeadConduit response for duplicate
                    $fallbackBody = json_decode($fallbackResponse->body(), true);
                    if (
                        isset($fallbackBody['outcome']) && $fallbackBody['outcome'] === 'failure' &&
                        isset($fallbackBody['reason']) && stripos($fallbackBody['reason'], 'duplicate') !== false
                    ) {

                        Log::info('Duplicate lead detected in LeadConduit');
                        $leadConduitIsDuplicate = true;

                        // Check if BOTH systems reported duplicate
                        if ($enduranceIsDuplicate && $leadConduitIsDuplicate) {
                            Log::info('Lead is duplicate in BOTH Endurance and LeadConduit');

                            session()->put('lead_destination', 'Already Submitted Previously');
                            session()->put('lead_already_submitted', true);

                            return response()->json([
                                'success' => true,
                                'message' => 'This lead has been submitted previously to both our primary and backup systems.',
                                'destination' => 'Already Submitted Previously'
                            ]);
                        } else {
                            // LeadConduit duplicate but Endurance wasn't, still count as submitted to LeadConduit
                            Log::info('Lead was duplicate in LeadConduit but submitted successfully (Endurance had non-duplicate error)');

                            session()->put('lead_destination', 'American Dream');
                            session()->put('lead_already_submitted', true);

                            return response()->json([
                                'success' => true,
                                'message' => 'Your lead has been successfully submitted via our backup system.',
                                'destination' => 'American Dream'
                            ]);
                        }
                    }

                    Log::info('Lead successfully sent to LeadConduit (American Dream)');

                    session()->put('lead_destination', 'American Dream');
                    session()->put('lead_already_submitted', true);

                    return response()->json([
                        'success' => true,
                        'message' => 'Your lead has been successfully submitted via our backup system. You should receive a response shortly.',
                        'destination' => 'American Dream'
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Submission exception occurred');
            Log::error('Exception message: ' . $e->getMessage());
            Log::error('Exception trace: ' . $e->getTraceAsString());

            session()->flash('lead_destination', 'System Error');

            return response()->json([
                'success' => false,
                'message' => 'Failed to submit lead due to a system error: ' . $e->getMessage(),
                'destination' => 'System Error'
            ]);
        }
    }

    /**
     * Convert mileage range to numeric value
     */
    private function convertMileageToNumeric($mileageRange)
    {
        $mileageMap = [
            'less-than-100k' => 75000,
            '100k-140k' => 120000,
            '140k-200k' => 170000,
            'more-than-200k' => 225000,
        ];

        return $mileageMap[$mileageRange] ?? 100000;
    }
}