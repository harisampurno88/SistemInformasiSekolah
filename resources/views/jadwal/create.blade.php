@section('head')
     Data Jadwal
 @endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('jadwal') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('jadwal') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_jadwal" class="col-sm-2 col-form-label">Id Jadwal</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_jadwal' value="{{ Session::get('id_jadwal') }}"
                                id="id_jadwal">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">Id Kelas</label>
                        <div class="col-sm-10">
                            <select name="id_kelas" id="id_kelas" class="form-select">
                                <option value="">-- Pilih Id Kelas --</option>
                                @forelse ($kelasList as $kelas)
                                    <option value="{{ $kelas->id_kelas }}"
                                        {{ (old('id_kelas') ?? (Session::get('id_kelas') ?? '')) == $kelas->id_kelas ? 'selected' : '' }}>
                                        {{ $kelas->id_kelas }}
                                    </option>
                                @empty
                                    <option disabled>Data Kelas belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-10">
                            <select name="nip" id="nip" class="form-select">
                                <option value="">-- Pilih NIP--</option>
                                @forelse ($guruList as $guru)
                                    <option value="{{ $guru->nip }}"
                                        {{ (old('nip') ?? (Session::get('nip') ?? '')) == $guru->nip ? 'selected' : '' }}>
                                        {{ $guru->nip }}
                                    </option>
                                @empty
                                    <option disabled>Data Guru belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <select name="id_mata_pelajaran" id="id_mata_pelajaran" class="form-select">
                                <option value="">-- Pilih Id Mata Pelajaran--</option>
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
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="hari" value="{{ Session::get('hari') }}"
                                id="hari">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name='jam_mulai' value="{{ Session::get('jam_mulai') }}"
                                id="jam_mulai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name='jam_selesai'
                                value="{{ Session::get('jam_selesai') }}" id="jam_selesai">
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
