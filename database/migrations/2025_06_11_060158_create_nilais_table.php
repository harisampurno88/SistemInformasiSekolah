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
        Schema::create('nilai', function (Blueprint $table) {
            $table->increments('id_nilai');
            $table->primary('id_nilai');
            $table->integer('id_siswa');
            $table->integer('id_mata_pelajaran');
            $table->integer('id_tahun_ajaran');
            $table->decimal('nilai_tugas', 5, 2);
            $table->decimal('nilai_uts', 5, 2);
            $table->decimal('nilai_uas', 5, 2);
            $table->integer('kehadiran');
            $table->text('catatan_guru');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
