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
            $table->integer('nip');
            $table->primary('nip');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('alamat');
            $table->integer('no_telepon');
            $table->integer('id_mata_pelajaran');
            $table->string('jabatan');
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
