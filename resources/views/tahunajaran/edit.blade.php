@section('head')
    Data Tahun Ajaran
@endsection
@extends('layout.template')
<!-- START FORM -->
@section('content')
    <form action='{{ url('tahunajaran/' . $data->id_tahun_ajaran) }}' method='post'>
        @csrf
        @method('PUT')
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <a href='{{ url('tahunajaran') }}' class="btn btn-secondary">
                << Kembali</a>
                    <div class="mb-3 row">
                        <label for="id_tahun_ajaran" class="col-sm-2 col-form-label">Id Tahun Ajaran</label>
                        <div class="col-sm-10">
                            {{ $data->id_tahun_ajaran }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_mulai" class="col-sm-2 col-form-label">Tahun Mulai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='tahun_mulai' value="{{ $data->tahun_mulai }}"
                                id="tahun_mulai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_selesai" class="col-sm-2 col-form-label">Tahun Selesai</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name='tahun_selesai'
                                value="{{ $data->tahun_selesai }}" id="tahun_selesai">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="status" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-select" name="status" id="status">
                                <option value="">-- Pilih Status --</option>
                                <option value="AKTIF" {{ $data->status == 'AKTIF' ? 'selected' : '' }}>
                                    AKTIF</option>
                                <option value="TIDAK AKTIF" {{ $data->status == 'TIDAK AKTIF' ? 'selected' : '' }}>
                                    TIDAK AKTIF</option>
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
