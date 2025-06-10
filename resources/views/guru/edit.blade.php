@section('head')
    Data Guru
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('guru/' . $data->nip) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('guru') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_guru" class="col-sm-2 col-form-label">Id Guru</label>
                        <div class="col-sm-10">
                            {{ $data->id_guru }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            {{ $data->nip }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='nama' value="{{ $data->nama }}"
                                id="nama">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name='tanggal_lahir'
                                value="{{ $data->tanggal_lahir }}" id="tanggal_lahir">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-Laki" {{ $data->jenis_kelamin == 'Laki-Laki' ? 'selected' : '' }}>
                                    Laki-Laki</option>
                                <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                    Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='alamat' value="{{ $data->alamat }}"
                                id="alamat">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_telepon" class="col-sm-2 col-form-label">No Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='no_telepon' value="{{ $data->no_telepon }}"
                                id="no_telepon">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_mata_pelajaran'
                                value="{{ $data->id_mata_pelajaran }}" id="id_mata_pelajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="jabatan" id="jabatan">
                                <option value="">-- Pilih Jabatan --</option>
                                <option value="PNS" {{ $data->jabatan == 'PNS' ? 'selected' : '' }}>
                                    PNS</option>
                                <option value="HONOR" {{ $data->jabatan == 'HONOR' ? 'selected' : '' }}>
                                    HONOR</option>
                            </select>
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
