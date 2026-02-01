<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = ['salon_id', 'name', 'category', 'price', 'duration_minutes'];

    public function salon(): BelongsTo
    {
        return $this->belongsTo(Salon::class);
    }
}
