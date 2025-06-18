<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengurus extends Model
{
    use HasFactory, SoftDeletes;

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }

    public function blok() {
        return $this->belongsTo(Blok::class);
    }
}
