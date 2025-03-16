<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class TransaksiIuran extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id', 'iuran_id', 'tanggal_bayar', 'status_bayar', 'bukti_bayar'
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function iuran()
    {
        return $this->belongsTo(Iuran::class);
    }

    public function getNamaTanggalAttribute()
    {
        return $this->warga->nama . ' - ' . Carbon::parse($this->tanggal_bayar)->format('d M Y');
    }
}
