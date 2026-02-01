<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('salons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('owner_id')->constrained('users');
            $table->string('location_city')->nullable();
            $table->string('location_state')->nullable();
            $table->json('business_hours')->nullable();
            $table->text('gallery')->nullable();
            $table->timestamps();
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('salon_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('category')->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('duration_minutes')->default(30);
            $table->timestamps();
        });

        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('users');
            $table->foreignId('salon_id')->constrained()->cascadeOnDelete();
            $table->foreignId('service_id')->constrained();
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('services');
        Schema::dropIfExists('salons');
    }
};
