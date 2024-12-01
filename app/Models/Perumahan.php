<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $nama_perumahan
 * @property string $alamat
 * @property string $kota
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Blok> $blok
 * @property-read int|null $blok_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereKota($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereNamaPerumahan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Perumahan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Perumahan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_perumahan', 'alamat', 'kota'];

    public function blok()
    {
        return $this->hasMany(Blok::class);
    }
}
