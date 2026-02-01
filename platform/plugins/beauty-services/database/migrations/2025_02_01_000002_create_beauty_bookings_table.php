<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beauty_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id'); // user_id
            $table->foreignId('provider_id'); // store_id
            $table->foreignId('service_id');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('pending'); // Pending, Confirmed, Completed, Cancelled
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beauty_bookings');
    }
};
