<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BlokDetail extends Model
{
    public function wargas()
    {
        return $this->hasMany(Warga::class);
    }

    public function getJumlahWargasAttribute()
    {
        return $this->wargas()->count();
    }

    public function blok(): BelongsTo
    {
        return $this->belongsTo(Blok::class);
    }
}
