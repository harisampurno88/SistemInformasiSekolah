<?php

use App\Http\Controllers\guruController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\matapelajaranController;
use App\Http\Controllers\nilaiController;
use App\Http\Controllers\siswaController;
use App\Http\Controllers\tahunajaranController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', siswaController::class);

Route::resource('guru', guruController::class);

Route::resource('kelas', kelasController::class);

Route::resource('matapelajaran', matapelajaranController::class);

Route::resource('tahunajaran', tahunajaranController::class);

Route::resource('nilai', nilaiController::class);
