@section('head')
    Data Jadwal
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('jadwal/' . $data->id_jadwal) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('jadwal') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_jadwal" class="col-sm-2 col-form-label">Id Jadwal</label>
                        <div class="col-sm-10">
                            {{ $data->id_jadwal }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_kelas" class="col-sm-2 col-form-label">Id Kelas</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_kelas' value="{{ $data->id_kelas }}"
                                id="id_kelas">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_guru" class="col-sm-2 col-form-label">Id Guru</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_guru' value="{{ $data->id_guru }}"
                                id="id_guru">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id_mata_pelajaran" class="col-sm-2 col-form-label">Id Mata Pelajaran</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='id_mata_pelajaran'
                                value="{{ $data->id_mata_pelajaran }}" id="id_mata_pelajaran">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="hari" class="col-sm-2 col-form-label">Hari</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="hari" id="hari">
                                <option value="">-- Pilih Hari --</option>
                                <option value="Senin" {{ $data->hari == 'Senin' ? 'selected' : '' }}>
                                    Senin</option>
                                <option value="Selasa" {{ $data->hari == 'Selasa' ? 'selected' : '' }}>
                                    Selasa</option>
                                <option value="Rabu" {{ $data->hari == 'Rabu' ? 'selected' : '' }}>
                                    Rabu</option>
                                <option value="Kamis" {{ $data->hari == 'Kamis' ? 'selected' : '' }}>
                                    Kamis</option>
                                <option value="Jumat" {{ $data->hari == 'Jumat' ? 'selected' : '' }}>
                                    Jumat</option>
                                <option value="Sabtu" {{ $data->hari == 'Sabtu' ? 'selected' : '' }}>
                                    Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_mulai" class="col-sm-2 col-form-label">Jam Mulai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="jam_mulai"
                                value="{{ $data->jam_mulai ? \Carbon\Carbon::parse($data->jam_mulai)->format('H:i') : '' }}"
                                id="jam_mulai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jam_selesai" class="col-sm-2 col-form-label">Jam Selesai</label>
                        <div class="col-sm-10">
                            <input type="time" class="form-control" name="jam_selesai"
                                value="{{ $data->jam_selesai ? \Carbon\Carbon::parse($data->jam_selesai)->format('H:i') : '' }}"
                                id="jam_selesai">
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
