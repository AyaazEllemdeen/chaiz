<?php

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    public function createLead(array $data): Lead
    {
        return Lead::create([
            'year' => $data['year'],
            'make' => $data['make'],
            'model' => $data['model'],
            'car_mileage' => $data['mileage'],
            'state' => $data['state'],
            'zip' => $data['zip'],
            'email' => $data['email'],
            'user_name' => $data['name'],
            'user_number' => $data['phone'],
        ]);
    }
}
