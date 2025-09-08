<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->string('year');
            $table->string('make');
            $table->string('model');
            $table->string('car_mileage');
            // $table->string('warranty'); // removed
            $table->string('state');
            $table->string('zip');
            $table->string('email');
            $table->string('user_name');
            $table->string('user_number');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
