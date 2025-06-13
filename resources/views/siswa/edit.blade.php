@section('head')
    Data Siswa
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('siswa/' . $data->nisn) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('siswa') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
                        <div class="col-sm-10">
                            {{ $data->nisn }}
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
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Lahir</label>
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
                        <label for="id_kelas" class="col-sm-2 col-form-label">Id Kelas</label>
                        <div class="col-sm-10">
                            <select name="id_kelas" id="id_kelas" class="form-select">
                                <option value="">-- Pilih Id Kelas --</option>
                                @forelse ($kelasList as $kelas)
                                    <option value="{{ $kelas->id_kelas }}"
                                        {{ old('id_kelas', $data->id_kelas ?? '') == $kelas->id_kelas ? 'selected' : '' }}>
                                        {{ $kelas->id_kelas }}
                                    </option>
                                @empty
                                    <option disabled>Data kelas belum tersedia</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_tahun_ajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name='id_tahun_ajaran'
                                value="{{ $data->id_tahun_ajaran }}" id="id_tahun_ajaran">
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
