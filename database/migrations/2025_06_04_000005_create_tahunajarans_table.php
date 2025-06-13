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
        Schema::create('tahunajaran', function (Blueprint $table) {
            $table->unsignedInteger('id_tahun_ajaran');
            $table->primary('id_tahun_ajaran');
            $table->year('tahun_mulai');
            $table->year('tahun_selesai');
            $table->enum('status', ['AKTIF', 'TIDAK AKTIF']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tahunajaran');
    }
};
