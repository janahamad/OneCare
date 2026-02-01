<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Salon extends Model
{
    protected $fillable = ['name', 'owner_id', 'location_city', 'location_state', 'business_hours', 'gallery'];

    protected $casts = [
        'business_hours' => 'json',
        'gallery' => 'array',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }
}
