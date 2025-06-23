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
        Schema::create('transaksi_pengeluaran_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_pengeluaran_id')->constrained()->onDelete('cascade');
            $table->foreignId('kategori_transaksi_id')->constrained()->onDelete('cascade');
            $table->text('deskripsi')->nullable();
            $table->integer('qty');
            $table->decimal('jumlah', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_pengeluaran_details');
    }
};
