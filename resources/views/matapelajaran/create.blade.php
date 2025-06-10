@section('head')
    Data Mata Pelajaran
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('matapelajaran') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('matapelajaran') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_mata_pelajaran' value="{{ Session::get('id_mata_pelajaran') }}"
                                id="id_mata_pelajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_mata_pelajaran" class="col-sm-2 col-form-label">Nama Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_mata_pelajaran'
                                value="{{ Session::get('nama_mata_pelajaran') }}" id="nama_mata_pelajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kkm" class="col-sm-2 col-form-label">KKM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='kkm' value="{{ Session::get('kkm') }}"
                                id="kkm">
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
