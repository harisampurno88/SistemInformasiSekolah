<?php

use App\Models\tahunajaran;
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
            $table->integer('nisn');
            $table->foreign('nisn')
                ->references('nisn')
                ->on('siswa')
                ->onDelete('restrict');
            $table->unsignedInteger('id_mata_pelajaran');
            $table->foreign('id_mata_pelajaran')
                ->references('id_mata_pelajaran')
                ->on('matapelajaran')
                ->onDelete('restrict');
            $table->unsignedInteger('id_tahun_ajaran');
            $table->foreign('id_tahun_ajaran')
                ->references('id_tahun_ajaran')
                ->on('tahunajaran')
                ->onDelete('restrict');
            $table->decimal('nilai_tugas', 5, 2);
            $table->decimal('nilai_uts', 5, 2);
            $table->decimal('nilai_uas', 5, 2);
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
