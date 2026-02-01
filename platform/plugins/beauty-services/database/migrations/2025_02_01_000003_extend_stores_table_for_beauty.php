<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            if (!Schema::hasColumn('stores', 'business_hours')) {
                $table->json('business_hours')->nullable(); // Store opening/closing times
            }
            if (!Schema::hasColumn('stores', 'location_city')) {
                $table->string('location_city')->nullable();
            }
            if (!Schema::hasColumn('stores', 'location_state')) {
                $table->string('location_state')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('stores', function (Blueprint $table) {
            $table->dropColumn(['business_hours', 'location_city', 'location_state']);
        });
    }
};
