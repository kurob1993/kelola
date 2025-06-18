<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gang extends Model
{
    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function wargas()
    {
        return $this->hasMany(Warga::class);
    }
}
