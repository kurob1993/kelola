<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'blok_id', 'nama', 'nomor_rumah', 'no_telepon', 'email', 'tanggal_daftar'
    ];

    public function blok()
    {
        return $this->belongsTo(Blok::class);
    }

    public function transaksiIuran()
    {
        return $this->hasMany(TransaksiIuran::class);
    }
}
