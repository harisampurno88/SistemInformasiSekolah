@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('siswa') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nisn' id="nisn">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tanggallahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='tanggallahir' id="tanggallahir">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jeniskelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jeniskelamin' id="jeniskelamin">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' id="alamat">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="notelepon" class="col-sm-2 col-form-label">No Telepon</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' id="jurusan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idkelas" class="col-sm-2 col-form-label">Id Kelas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='idkelas' id="idkelas">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idtahunajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='idtahunajaran' id="idtahunajaran">
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
