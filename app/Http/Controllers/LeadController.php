<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LeadService;
use Illuminate\Support\Facades\Validator;

class LeadController extends Controller
{
    protected $leadService;

    public function __construct(LeadService $leadService)
    {
        $this->leadService = $leadService;
    }

    public function submit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sel-year' => 'required|string',
            'sel-make' => 'required|string',
            'sel-model' => 'required|string',
            'car_mileage' => 'required|string',
            'user-state' => 'required|string',
            'email' => 'required|email',
            'user-name' => 'required|string',
            'user-number' => 'required|string',
            'lead_destination' => 'nullable|string', 
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $lead = $this->leadService->createLead([
            'year' => $request->input('sel-year'),
            'make' => $request->input('sel-make'),
            'model' => $request->input('sel-model'),
            'mileage' => $request->input('car_mileage'),
            'state' => $request->input('user-state'),
            'email' => $request->input('email'),
            'name' => $request->input('user-name'),
            'phone' => $request->input('user-number'),
            'lead_destination' => $request->input('lead_destination', 'Unknown'),
        ]);

        return response()->json([
            'success' => true,
            'lead_id' => $lead->id,
            'destination' => $lead->lead_destination
        ]);
    }
}