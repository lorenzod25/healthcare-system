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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // Foreign key to patients table
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');

            // Foreign key to providers table
            $table->foreignId('provider_id')->constrained()->onDelete('cascade');

            // Appointment details
            $table->dateTime('scheduled_at');
            $table->text('reason')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
