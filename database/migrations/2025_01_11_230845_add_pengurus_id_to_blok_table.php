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
        Schema::table('bloks', function (Blueprint $table) {
            $table->unsignedBigInteger('rt_id')->nullable()->after('nama_blok');
            $table->unsignedBigInteger('kordinator_id')->nullable()->after('nama_blok');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bloks', function (Blueprint $table) {
            $table->dropColumn('rt_id');
            $table->dropColumn('kordinator_id');
        });
    }
};
