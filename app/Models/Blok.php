<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $perumahan_id
 * @property string $nama_blok
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Perumahan $perumahan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Warga> $warga
 * @property-read int|null $warga_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereNamaBlok($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok wherePerumahanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Blok whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Blok extends Model
{
    use HasFactory;

    protected $fillable = ['perumahan_id', 'nama_blok'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class);
    }

    public function warga()
    {
        return $this->hasMany(Warga::class);
    }
}
