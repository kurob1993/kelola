<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $warga_id
 * @property int $iuran_id
 * @property string $tanggal_bayar
 * @property string $status_bayar
 * @property string $metode_bayar
 * @property string|null $bukti_bayar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Iuran $iuran
 * @property-read \App\Models\Warga $warga
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereBuktiBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereIuranId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereMetodeBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereStatusBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereTanggalBayar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TransaksiIuran whereWargaId($value)
 * @mixin \Eloquent
 */
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
}
