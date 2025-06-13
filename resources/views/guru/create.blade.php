@section('head')
    Data Guru
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('guru') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('guru') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nip' value="{{ Session::get('nip') }}"
                                id="nip">
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
                            <input type="date" class="form-control" name='tanggal_lahir'
                                value="{{ Session::get('tanggal_lahir') }}" id="tanggal_lahir">
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
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-select">
                                <option value="">-- Pilih Id Mata Pelajaran --</option>
                                @forelse ($matapelajaranList as $matapelajaran)
                                    <option value="{{ $matapelajaran->id_mata_pelajaran }}"
                                        {{ (old('id_mata_pelajaran') ?? (Session::get('id_mata_pelajaran') ?? '')) == $matapelajaran->id_mata_pelajaran ? 'selected' : '' }}>
                                        {{ $matapelajaran->id_mata_pelajaran }}
                                    </option>
                                @empty
                                    <option disabled>Data Mata Pelajaran belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_jabatan" class="col-sm-2 col-form-label">Id Jabatan</label>
                        <div class="col-sm-10">
                            <select name="id_jabatan" id="id_jabatan" class="form-select">
                                <option value="">-- Pilih Id Jabatan --</option>
                                @forelse ($jabatanList as $jabatan)
                                    <option value="{{ $jabatan->id_jabatan }}"
                                        {{ (old('id_jabatan') ?? (Session::get('id_jabatan') ?? '')) == $jabatan->id_jabatan ? 'selected' : '' }}>
                                        {{ $jabatan->id_jabatan }}
                                    </option>
                                @empty
                                    <option disabled>Data Jabatan belum tersedia</option>
                                @endforelse
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
