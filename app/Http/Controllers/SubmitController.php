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
        // Merge request data into session (optional)
        if ($request->all()) {
            session(['carData' => $request->all()]);
        }

        $carData = session('carData');

        if (!$carData || empty($carData)) {
            return redirect('/');
        }

        return view('final', compact('carData'));
    }
}
