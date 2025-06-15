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
        Schema::create('transaksi_iuran_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_iuran_id')->constrained('transaksi_iurans')->onDelete('cascade');
            $table->foreignId('iuran_id')->constrained('iurans')->onDelete('cascade');
            $table->decimal('jumlah', 12, 2)->nullable(); // Optional, jika ingin menyimpan nilai bayar
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_iuran_details');
    }
};
