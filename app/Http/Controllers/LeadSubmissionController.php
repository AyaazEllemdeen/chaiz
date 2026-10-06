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

        $finalDestination = 'System Error';
        $finalMessage = 'Failed to submit lead due to a system error';

        try {
            // -------------------------------
            // 1. Send to Chaiz Partner Lead API
            // -------------------------------
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

            $isDuplicate = stripos($partnerResponse->body(), 'duplicate') !== false;

            if ($isDuplicate) {
                $finalDestination = 'Already Submitted Previously';
                $finalMessage = 'This lead has been submitted previously.';
                Log::info('Duplicate lead detected by Chaiz');
            } elseif ($partnerResponse->successful()) {
                $finalDestination = 'Chaiz';
                $finalMessage = 'Your lead has been successfully submitted.';
            } else {
                Log::error('Partner Lead API returned an error', [
                    'status' => $partnerResponse->status(),
                    'body' => $partnerResponse->body(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'Failed to submit lead to Chaiz',
                    'destination' => 'System Error',
                ]);
            }

            // -------------------------------
            // 2. Set session and return response
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

    private function splitName(string $fullName): array
    {
        $parts = explode(' ', $fullName, 2);
        return [
            ucfirst($parts[0] ?? ''),
            ucfirst($parts[1] ?? ''),
        ];
    }
}