<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadSubmissionController;
use App\Http\Controllers\LeadController;

Route::post('/lead-submit-db', [LeadController::class, 'submit']);

Route::post('/lead-submit', [LeadSubmissionController::class, 'store'])->name('lead.submit');

Route::get('/get-lead-destination', function () {
    return response()->json([
        'destination' => session('lead_destination', 'Successfully Submitted')
    ]);
});

Route::get('/', function () {
    return view('home');
});

