<?php

use App\Http\Controllers\SubmitController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadSubmissionController;
use App\Http\Controllers\LeadController;

// Home page
Route::get('/', function () {
    return view('home');
});

// Store lead in database
Route::post('/lead/store', [LeadController::class, 'submit'])->name('lead.store');

// Store car data in session
Route::post('/store-car-data', [SubmitController::class, 'storeCarData'])->name('store.car.data');

// Thank you page
Route::get('/thank-you', [SubmitController::class, 'submit'])->name('final');

// Legacy routes (if still needed)
Route::post('/lead-submit', [LeadSubmissionController::class, 'store'])->name('lead.submit');

Route::get('/get-lead-destination', function () {
    return response()->json([
        'destination' => session('lead_destination', 'Successfully Submitted')
    ]);
});