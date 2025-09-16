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

        // Log what was stored
        Log::debug('storeCarData called', [
            'request_data' => $request->all(),
            'session_after_store' => session('carData')
        ]);

        return response()->json(['status' => 'stored']);
    }

    // Show the final thank-you page
    public function submit(Request $request)
    {
        $carData = session('carData');

        // Log what is in session
        Log::debug('submit called', [
            'session_carData' => $carData
        ]);

        // Redirect back to home if no car data
        if (!$carData || empty($carData)) {
            Log::warning('No carData found in session, redirecting to home');
            return redirect('/');
        }

        return view('final', compact('carData'));
    }
}
