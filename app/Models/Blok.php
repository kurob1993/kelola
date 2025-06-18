<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blok extends Model
{
    use HasFactory;

    protected $fillable = ['perumahan_id', 'nama_blok'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }

    public function blokDetail() {
        return $this->hasMany(BlokDetail::class);
    }
}
