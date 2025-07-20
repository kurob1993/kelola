<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TransaksiIuran extends Model
{
    use HasFactory;

    // Kolom yang boleh diisi secara massal (create/update)
    protected $fillable = [
        'warga_id',
        'tanggal_bayar',         // Tanggal jatuh tempo
        'tanggal_pelunasan',     // Tanggal aktual pembayaran
        'status_bayar',
        'metode_bayar',
        'bukti_bayar',
    ];

    // Casting ke tipe data (otomatis jadi objek Carbon)
    protected $casts = [
        'tanggal_bayar' => 'date',
        'tanggal_pelunasan' => 'date',
    ];

    // Relasi ke model Warga
    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    // Relasi ke model Iuran (jika kamu punya relasi ke data iuran tertentu)
    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }

    // Relasi ke detail transaksi (misalnya untuk rincian pembayaran)
    public function transaksiIuranDetails()
    {
        return $this->hasMany(TransaksiIuranDetail::class);
    }

    // Total dari semua detail iuran
    public function getTotalIuranAttribute()
    {
        return $this->transaksiIuranDetails()->sum('jumlah');
    }

    // Accessor gabungan nama warga dan tanggal jatuh tempo
    public function getNamaTanggalAttribute()
    {
        return $this->warga->nama . ' - ' . Carbon::parse($this->tanggal_bayar)->format('d M Y');
    }

    // Accessor untuk format tanggal pelunasan (jika ada)
    public function getTanggalPelunasanFormattedAttribute()
    {
        return $this->tanggal_pelunasan
            ? $this->tanggal_pelunasan->format('d M Y')
            : '-';
    }
}
