<?php

use App\Http\Controllers\guruController;
use App\Http\Controllers\kelasController;
use App\Http\Controllers\siswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('siswa', siswaController::class);

Route::resource('guru', guruController::class);

Route::resource('kelas', kelasController::class);
