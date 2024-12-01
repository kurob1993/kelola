<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $fillable = ['nama_perumahan', 'alamat', 'kota'];

    public function blok()
    {
        return $this->hasMany(Blok::class);
    }
}
