<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeadSubmissionController;

Route::post('/lead-submit', [LeadSubmissionController::class, 'store'])->name('lead.submit');

Route::get('/', function () {
    return view('home');
});

Route::get('/h2', function () {
    return view('home2');
});
