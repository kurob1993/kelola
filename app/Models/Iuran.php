<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $fillable = ['nama_iuran', 'nominal', 'deskripsi', 'periode'];

    public function transaksiIuran()
    {
        return $this->hasMany(TransaksiIuran::class);
    }
}
