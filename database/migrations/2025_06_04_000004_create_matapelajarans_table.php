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
        Schema::create('matapelajaran', function (Blueprint $table) {
            $table->increments('id_mata_pelajaran');
            $table->primary('id_mata_pelajaran');
            $table->string('nama_mata_pelajaran');
            $table->unique('nama_mata_pelajaran');
            $table->integer('kkm');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matapelajaran');
    }
};
