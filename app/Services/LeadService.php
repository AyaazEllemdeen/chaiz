<?php

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    public function createLead(array $data): Lead
    {
        // Get zip code from config based on state
        $stateCode = strtoupper($data['state']);
        $zipCode = config("zipcodes.{$stateCode}", config('zipcodes.default'));

        return Lead::create([
            'year' => $data['year'],
            'make' => $data['make'],
            'model' => $data['model'],
            'car_mileage' => $data['mileage'],
            'state' => $data['state'],
            'zip' => $zipCode,
            'email' => $data['email'],
            'user_name' => $data['name'],
            'user_number' => $data['phone'],
        ]);
    }
}