<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $nama
 * @property int $perumahan_id
 * @property int $blok_id
 * @property string $nomor_rumah
 * @property string $no_telepon
 * @property string|null $email
 * @property string $tanggal_daftar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Blok $blok
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TransaksiIuran> $transaksiIuran
 * @property-read int|null $transaksi_iuran_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereBlokId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereNomorRumah($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga wherePerumahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereTanggalDaftar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Warga whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
