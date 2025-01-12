<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }
}
