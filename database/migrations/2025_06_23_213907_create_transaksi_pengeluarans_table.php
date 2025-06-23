<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_pengeluarans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
            $table->string('dibuat_oleh');
            $table->string('bukti_url')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluarans');
    }
};
