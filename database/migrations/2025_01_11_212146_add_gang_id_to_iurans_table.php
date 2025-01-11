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
        Schema::table('iurans', function (Blueprint $table) {
            $table->unsignedBigInteger('gang_id')->nullable()->after('periode');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('iurans', function (Blueprint $table) {
            $table->dropColumn('gang_id');
        });
    }
};
