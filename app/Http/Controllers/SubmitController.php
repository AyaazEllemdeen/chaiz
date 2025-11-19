<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubmitController extends Controller
{
    // Store car data in session
    public function storeCarData(Request $request)
    {
        session(['carData' => $request->all()]);

        return response()->json(['status' => 'stored']);
    }

    // Show the final thank-you page
    public function submit(Request $request)
    {
        // Merge request data into session (optional)
        if ($request->all()) {
            session(['carData' => $request->all()]);
        }

        $carData = session('carData');

        if (!$carData || empty($carData)) {
            return redirect('/');
        }

        // Get the lead destination from session, with default fallback
        $leadDestination = session('lead_destination', 'Successfully Submitted');

        Log::info('Thank you page loaded with destination: ' . $leadDestination);
        Log::info('Session data:', session()->all());

        return view('final', compact('carData', 'leadDestination'));
    }
}