<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_iurans', function (Blueprint $table) {
             $table->id();
            $table->foreignId('warga_id')->constrained('wargas')->onDelete('cascade');
            $table->foreignId('iuran_id')->constrained('iurans')->onDelete('cascade');
            $table->date('tanggal_bayar');
            $table->enum('status_bayar', ['lunas', 'belum lunas', 'tertunda']);
            $table->enum('metode_bayar', ['cash', 'transfer', 'online']);
            $table->string('bukti_bayar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_iurans');
    }
};
