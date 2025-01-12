<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $fillable = [
        'blok_id', 'nama', 'nomor_rumah', 'no_telepon', 'email', 'tanggal_daftar', 'gang_id'
    ];

    public function blok()
    {
        return $this->belongsTo(Blok::class);
    }

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }

    public function transaksiIuran()
    {
        return $this->hasMany(TransaksiIuran::class);
    }

    public function pengurus()
    {
        return $this->hasOne(Pengurus::class);
    }
}
