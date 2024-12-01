<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $nama_iuran
 * @property string $nominal
 * @property string|null $deskripsi
 * @property string $periode
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransaksiIuran> $transaksiIuran
 * @property-read int|null $transaksi_iuran_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereNamaIuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereNominal($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran wherePeriode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iuran whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Iuran extends Model
{
    use HasFactory;

    protected $fillable = ['nama_iuran', 'nominal', 'deskripsi', 'periode'];

    public function transaksiIuran()
    {
        return $this->hasMany(TransaksiIuran::class);
    }
}
