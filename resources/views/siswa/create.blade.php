@section('head')
     Data Siswa
 @endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('siswa') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('siswa') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_siswa" class="col-sm-2 col-form-label">Id Siswa</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_siswa' value="{{ Session::get('id_siswa') }}"
                                id="id_siswa">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nisn' value="{{ Session::get('nisn') }}"
                                id="nisn">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' value="{{ Session::get('nama') }}"
                                id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal_lahir' value="{{ Session::get('tanggal_lahir') }}"
                                id="tanggal_lahir">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jenis_kelamin" value="{{ Session::get('jenis_kelamin') }}"
                                id="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' value="{{ Session::get('alamat') }}"
                                id="alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='no_telepon'
                                value="{{ Session::get('no_telepon') }}" id="no_telepon">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">Id Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_kelas'
                                value="{{ Session::get('id_kelas') }}" id="id_kelas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_tahun_ajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_tahun_ajaran'
                                value="{{ Session::get('id_tahun_ajaran') }}" id="id_tahun_ajaran">
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
