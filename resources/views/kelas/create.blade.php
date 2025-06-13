@section('head')
    Data Kelas
@endsection
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
                            <input type="text" class="form-control" name='nama_kelas'
                                value="{{ Session::get('nama_kelas') }}" id="nama_kelas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tingkat" class="col-sm-2 col-form-label">Tingkat</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="tingkat" id="tingkat" required>
                                <option value="" disabled selected>Pilih Tingkat</option>
                                <option value="X">X</option>
                                <option value="XI">XI</option>
                                <option value="XII">XII</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='jurusan' value="{{ Session::get('jurusan') }}"
                                id="jurusan">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_guru" class="col-sm-2 col-form-label">Id Guru</label>
                        <div class="col-sm-10">
                            <input type="integer" class="form-control" name='id_guru'
                                value="{{ Session::get('id_guru') }}" id="id_guru">
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
