<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $carData = session('carData');


        return view('final', compact('carData'));
    }
}
