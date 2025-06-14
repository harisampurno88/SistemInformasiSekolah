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
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            <select name="nisn" id="nisn" class="form-select">
                                <option value="">-- Pilih NISN --</option>
                                @forelse ($siswaList as $siswa)
                                    <option value="{{ $siswa->nisn }}"
                                        {{ (old('nisn') ?? (Session::get('nisn') ?? '')) == $siswa->nisn ? 'selected' : '' }}>
                                        {{ $siswa->nisn }}
                                    </option>
                                @empty
                                    <option disabled>Data NISN Siswa belum tersedia</option>
                                @endforelse
                            </select>
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
                                    <option disabled>Data Tahun Ajaran belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_tahun_ajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-select">
                                <option value="">-- Pilih Id Tahun Ajaran --</option>
                                @forelse ($tahunajaranList as $tahunajaran)
                                    <option value="{{ $tahunajaran->id_tahun_ajaran }}"
                                        {{ (old('id_tahun_ajaran') ?? (Session::get('id_tahun_ajaran') ?? '')) == $tahunajaran->id_tahun_ajaran ? 'selected' : '' }}>
                                        {{ $tahunajaran->id_tahun_ajaran }}
                                    </option>
                                @empty
                                    <option disabled>Data Tahun Ajaran belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_tugas" class="col-sm-2 col-form-label">Nilai Tugas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nilai_tugas'
                                value="{{ Session::get('nilai_tugas') }}" id="nilai_tugas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nilai_uts" class="col-sm-2 col-form-label">Nilai UTS</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='nilai_uts'
                                value="{{ Session::get('nilai_uts') }}" id="nilai_uts">
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
                        <label for="jurusan" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                        </div>
                    </div>
        </div>
    </form>
@endsection
<!-- AKHIR FORM -->
