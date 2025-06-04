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
        Schema::create('siswa', function (Blueprint $table) {
            $table->integer('nisn');
            $table->primary('nisn');
            $table->string('nama');
            $table->integer('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->integer('no_telepon');
            $table->integer('id_kelas');
            $table->integer('id_tahun_ajaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
