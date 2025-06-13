@section('head')
    Data Jabatan
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('jabatan/' . $data->id_jabatan) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('jabatan') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_jabatan" class="col-sm-2 col-form-label">Id Jabatan</label>
                        <div class="col-sm-10">
                            {{ $data->id_jabatan }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama_jabatan" class="col-sm-2 col-form-label">Tahun Mulai</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama_jabatan' value="{{ $data->nama_jabatan }}"
                                id="nama_jabatan">
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
