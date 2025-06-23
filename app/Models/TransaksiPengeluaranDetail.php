<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPengeluaranDetail extends Model
{
    use HasFactory;

    protected $fillable = ['transaksi_pengeluaran_id', 'kategori', 'deskripsi', 'jumlah', 'bukti_url'];

    public function transaksi()
    {
        return $this->belongsTo(TransaksiPengeluaran::class, 'transaksi_pengeluaran_id');
    }

    public function kategoriTransaksi() {
        return $this->belongsTo(KategoriTransaksi::class);
    }
}
