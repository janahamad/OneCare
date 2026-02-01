<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beauty_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->nullable(); // Hair, Nails, Skincare, etc.
            $table->decimal('price', 15, 2);
            $table->integer('duration_minutes')->default(30);
            $table->foreignId('provider_id'); // Reference to stores table
            $table->string('status')->default('published');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beauty_services');
    }
};
