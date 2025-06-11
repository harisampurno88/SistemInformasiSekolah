@section('head')
     Data Nilai
 @endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('nilai') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('nilai') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_nilai" class="col-sm-2 col-form-label">Id Nilai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_nilai' value="{{ Session::get('id_nilai') }}"
                                id="id_nilai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_siswa" class="col-sm-2 col-form-label">Id Siswa</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_siswa' value="{{ Session::get('id_siswa') }}"
                                id="id_siswa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_mata_pelajaran' value="{{ Session::get('id_mata_pelajaran') }}"
                                id="id_mata_pelajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_tahun_ajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_tahun_ajaran' value="{{ Session::get('id_tahun_ajaran') }}"
                                id="id_tahun_ajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_tugas" class="col-sm-2 col-form-label">Nilai Tugas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nilai_tugas' value="{{ Session::get('nilai_tugas') }}"
                                id="nilai_tugas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_uts" class="col-sm-2 col-form-label">Nilai UTS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nilai_uts' value="{{ Session::get('nilai_uts') }}"
                                id="nilai_uts">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_uas" class="col-sm-2 col-form-label">Nilai UAS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nilai_uas'
                                value="{{ Session::get('nilai_uas') }}" id="nilai_uas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kehadiran" class="col-sm-2 col-form-label">Kehadiran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='kehadiran'
                                value="{{ Session::get('kehadiran') }}" id="kehadiran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="catatan_guru" class="col-sm-2 col-form-label">Catatan Guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='catatan_guru' value="{{ Session::get('catatan_guru') }}"
                                id="catatan_guru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>
@endsection
<!-- AKHIR FORM -->
