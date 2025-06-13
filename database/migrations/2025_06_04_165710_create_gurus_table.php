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
        Schema::create('guru', function (Blueprint $table) {
            $table->primary('nip');
            $table->integer('nip');
            $table->unique('nip');
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->string('no_telepon', 15);
            $table->unsignedInteger('id_mata_pelajaran');
            $table->foreign('id_mata_pelajaran')
                ->references('id_mata_pelajaran')
                ->on('matapelajaran')
                ->onDelete('restrict');
            $table->unsignedInteger('id_jabatan');
            $table->foreign('id_jabatan')
                ->references('id_jabatan')
                ->on('jabatan')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru');
    }
};
