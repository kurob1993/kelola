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
        Schema::table('transaksi_iurans', function (Blueprint $table) {
            $table->string('metode_bayar')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi_iurans', function (Blueprint $table) {
            $table->string('metode_bayar')->nullable(false)->change();
        });
    }
};
