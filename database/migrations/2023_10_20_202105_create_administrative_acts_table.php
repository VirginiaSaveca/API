<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrative_acts', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->foreignId('employee_id')->constrained();
            $table->string('name');
            $table->date('appointment_date');
            $table->date('visa_date')->nullable;
            $table->string('visa_nr')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrative_acts');
    }
};