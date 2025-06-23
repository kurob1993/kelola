<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaran extends Model
{
   use HasFactory;

    protected $fillable = ['tanggal', 'keterangan', 'total', 'dibuat_oleh'];

    public function transaksiPengeluaranDetails()
    {
        return $this->hasMany(TransaksiPengeluaranDetail::class);
    }

    public function getTotalPengeluaranAttribute()
    {
        return $this->transaksiPengeluaranDetails()->sum('jumlah')*$this->transaksiPengeluaranDetails()->sum('qty');
    }
}
