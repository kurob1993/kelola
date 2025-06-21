<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiIuranDetail extends Model
{
    public function iuran() {
        return $this->belongsTo(Iuran::class, 'iuran_id');
    }

    public function transaksiIuran() {
        return $this->belongsTo(TransaksiIuran::class);
    }
}
