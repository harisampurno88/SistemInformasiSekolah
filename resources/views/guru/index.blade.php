 @section('head')
     Data Guru
 @endsection
 @extends('layout.template')
 <!-- START DATA -->
 @section('content')
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="{{ url('guru') }}" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <!-- TOMBOL TAMBAH DATA -->
         <div class="pb-3">
             <a href='{{ url('guru/create') }}' class="btn btn-primary">+ Tambah Data</a>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">NO</th>
                     <th class="col-md-1">NIP</th>
                     <th class="col-md-3">Nama Guru</th>
                     <th class="col-md-2">Jenis Kelamin</th>
                     <th class="col-md-2">Alamat</th>
                     <th class="col-md-2">No Telepon</th>
                     <th class="col-md-2">Id Mata Pelajaran</th>
                     <th class="col-md-2">Jabatan</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = $data->firstItem(); ?>
                 @foreach ($data as $item)
                     <tr>
                         <td>{{ $i }}</td>
                         <td>{{ $item->nip }}</td>
                         <td>{{ $item->nama }}</td>
                         <td>{{ $item->jenis_kelamin }}</td>
                         <td>{{ $item->alamat }}</td>
                         <td>{{ $item->no_telepon }}</td>
                         <td>{{ $item->id_mata_pelajaran }}</td>
                         <td>{{ $item->jabatan }}</td>
                         <td class="d-inline-flex">
                             <a href='{{ url('guru/' . $item->nip . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                             <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('guru/' . $item->nip) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                 <button type="submit" name="submit" class="btn btn-danger btn-sm">
                                    Del
                                 </button>
                             </form>
                         </td>
                     </tr>
                     <?php $i++; ?>
                 @endforeach
             </tbody>
         </table>
         {{ $data->withQueryString()->links() }}

     </div>
 @endsection
 <!-- AKHIR DATA -->
