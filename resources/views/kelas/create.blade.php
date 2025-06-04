@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('kelas') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('kelas') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">Id Kelas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_kelas' value="{{ Session::get('id_kelas') }}"
                                id="id_kelas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_kelas" class="col-sm-2 col-form-label">Nama Kelas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_kelas' value="{{ Session::get('nama_kelas') }}"
                                id="nama_kelas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tingkat" class="col-sm-2 col-form-label">Tingkat</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='tingkat' value="{{ Session::get('tingkat') }}"
                                id="tingkat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jurusan'
                                value="{{ Session::get('jurusan') }}" id="jurusan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_guru" class="col-sm-2 col-form-label">Nama Guru</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_guru'
                                value="{{ Session::get('nama_guru') }}" id="nama_guru">
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
