<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class LeadSubmissionController extends Controller
{
    public function store(Request $request)
    {
        // \Log::info('LeadSubmissionController@store called');
        // \Log::info('Request data:', $request->all());

        $validated = $request->validate([
            'sel-year' => 'required|integer',
            'sel-make' => 'required|string',
            'sel-model' => 'required|string',
            'car_mileage' => 'required|string',
            'warranty' => 'required|string',
            'user-state' => 'required|string',
            'user-zip' => 'required|digits:5',
            'email' => 'required|email',
            'user-name' => 'required|string',
            'user-number' => 'required|string',
        ]);

        $nameParts = explode(' ', $validated['user-name'], 2);
        $firstName = ucfirst($nameParts[0] ?? '');
        $lastName = ucfirst($nameParts[1] ?? '');

        $payload = [
            'firstName' => $firstName,
            'lastName' => $lastName,
            'state' => strtoupper($validated['user-state']),
            'zipCode' => $validated['user-zip'],
            'phone' => $validated['user-number'],
            'email' => $validated['email'],
            'year' => (int) $validated['sel-year'],
            'make' => $validated['sel-make'],
            'model' => $validated['sel-model'],
            'mileage' => $validated['car_mileage'],
            'smsOptIn' => true,
        ];

        $url = 'https://1leadsubmission.enduranceapi.com/api/v1/leads';

        try {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json-patch+json',
            ])
                ->withBasicAuth('CHAIZ-INT-chaizcwhp', 'NqkTOZ2vJBEi3cpn')
                ->post($url, $payload);

            // \Log::info('LeadSubmission API response status: ' . $response->status());
            // \Log::info('LeadSubmission API response body: ' . $response->body());

            $chaizData = [
                'make' => strtolower($validated['sel-make']),
                'model' => strtolower($validated['sel-model']),
                'year' => (int) $validated['sel-year'],
                'state' => strtoupper($validated['user-state']),
                'mileage' => (int) $validated['car_mileage'],
                'userId' => '96d8841b-6ae6-4cb6-9b43-401662e25560'
            ];

            session()->flash('chaiz_search_data', $chaizData);

            if ($response->successful()) {
                // Lead successfully sent to Endurance
                session()->flash('lead_destination', 'Endurance');
                return response()->json([
                    'success' => true,
                    'message' => 'Your lead has been successfully submitted to Endurance for processing. You should receive a response shortly.',
                    'destination' => 'Endurance'
                ]);
            } else {
                // Fallback to LeadConduit if Endurance fails
                $fallbackUrl = 'https://1app.leadconduit.com/flows/65832665b40f680b034dae9b/sources/68471ebce9693c54cfa25e07/submit';

                // Generate random UMIDs
                $umid_adap = bin2hex(random_bytes(6));
                $umid2_adap = bin2hex(random_bytes(6));

                $leadConduitPayload = [
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'state' => strtoupper($validated['user-state']),
                    'zipCode' => $validated['user-zip'],
                    'phone_1' => $validated['user-number'],
                    'email' => $validated['email'],
                    'year' => $validated['sel-year'],
                    'make' => $validated['sel-make'],
                    'model' => $validated['sel-model'],
                    'mileage' => $validated['car_mileage'],
                    'lead_type_adap' => 'E',
                    'umid_adap' => $umid_adap,
                    'umid2_adap' => $umid2_adap,
                    'company.name' => "Null",
                ];

                $fallbackResponse = Http::asForm()->post($fallbackUrl, $leadConduitPayload);

                if ($fallbackResponse->successful()) {
                    // Lead successfully sent to LeadConduit (American Dream)
                    session()->flash('lead_destination', 'American Dream');
                    return response()->json([
                        'success' => true,
                        'message' => 'Your lead has been successfully submitted via our backup system. You should receive a response shortly.',
                        'destination' => 'American Dream'
                    ]);
                } else {
                    // Both systems failed
                    session()->flash('lead_destination', 'Submission Failed');
                    return response()->json([
                        'success' => false,
                        'message' => 'We were unable to submit your lead at this time. Both our primary and backup systems are currently unavailable. Please try again later or contact support.',
                        'destination' => 'Submission Failed'
                    ]);
                }
            }
        } catch (\Exception $e) {
            Log::error('Submission exception: ' . $e->getMessage());
            session()->flash('lead_destination', 'System Error');
            return response()->json([
                'success' => false,
                'message' => 'Failed to submit lead due to a system error: ' . $e->getMessage(),
                'destination' => 'System Error'
            ]);
        }
    }
}