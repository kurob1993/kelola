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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('perumahan_id')->constrained('perumahans')->onDelete('cascade');
            $table->foreignId('blok_id')->constrained('bloks')->onDelete('cascade');
            $table->string('nomor_rumah');
            $table->string('no_telepon');
            $table->string('email')->nullable();
            $table->date('tanggal_daftar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
