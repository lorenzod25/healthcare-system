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
    Schema::create('billings', function (Blueprint $table) {
        $table->id();
        $table->foreignId('appointment_id')->constrained()->onDelete('cascade');
        $table->decimal('amount', 10, 2);
        $table->string('status')->default('unpaid'); // paid, unpaid, pending
        $table->string('payment_method')->nullable();
        $table->date('billing_date'); // Added billing date
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billings');
    }
};
