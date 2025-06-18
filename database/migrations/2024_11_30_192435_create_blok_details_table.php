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
        Schema::create('blok_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blok_id')->constrained('bloks')->onDelete('cascade');
            $table->string('nama_blok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blok_details');
    }
};
