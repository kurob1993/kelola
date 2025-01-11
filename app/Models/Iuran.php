<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Iuran extends Model
{
    use HasFactory;

    protected $casts = [
        'nominal' => 'decimal:2',
    ];

    protected $fillable = ['nama_iuran', 'nominal', 'deskripsi', 'periode'];

    public function transaksiIuran()
    {
        return $this->hasMany(TransaksiIuran::class);
    }

    public function setNominalAttribute($value)
    {
        // Hapus format seperti "50,000" menjadi "50000"
        $this->attributes['nominal'] = str_replace(',', '', $value);
    }

    public function getNominalAttribute()
    {
        return round($this->attributes['nominal']);
    }

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }
}
