<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
