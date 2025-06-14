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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->increments('id_jadwal');
            $table->primary('id_jadwal');
            $table->unsignedInteger('id_kelas');
            $table->foreign('id_kelas')
                ->references('id_kelas')
                ->on('kelas')
                ->onDelete('restrict');
            $table->integer('nip');
            $table->foreign('nip')
                ->references('nip')
                ->on('guru')
                ->onDelete('restrict');
            $table->integer('id_mata_pelajaran');
            $table->foreign('id_mata_pelajaran')
                ->references('id_mata_pelajaran')
                ->on('matapelajaran')
                ->onDelete('restrict');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
