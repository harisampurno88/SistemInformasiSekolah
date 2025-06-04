 @extends('layout.template')
 <!-- START DATA -->
 @section('content')
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="{{ url('siswa') }}" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <!-- TOMBOL TAMBAH DATA -->
         <div class="pb-3">
             <a href='{{ url('siswa/create') }}' class="btn btn-primary">+ Tambah Data</a>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">NO</th>
                     <th class="col-md-1">NISN</th>
                     <th class="col-md-3">Nama Siswa</th>
                     <th class="col-md-2">Jenis Kelamin</th>
                     <th class="col-md-2">Alamat</th>
                     <th class="col-md-2">No Telepon</th>
                     <th class="col-md-2">Id Kelas</th>
                     <th class="col-md-2">Id Tahun Ajaran</th>
                 </tr>
             </thead>
             <tbody>
                 <?php $i = $data->firstItem(); ?>
                 @foreach ($data as $item)
                     <tr>
                         <td>{{ $i }}</td>
                         <td>{{ $item->nisn }}</td>
                         <td>{{ $item->nama }}</td>
                         <td>{{ $item->jenis_kelamin }}</td>
                         <td>{{ $item->alamat }}</td>
                         <td>{{ $item->no_telepon }}</td>
                         <td>{{ $item->id_kelas }}</td>
                         <td>{{ $item->id_tahun_ajaran }}</td>
                         <td class="d-inline-flex">
                             <a href='{{ url('siswa/' . $item->nisn . '/edit') }}' class="btn btn-warning btn-sm">Edit</a>
                             <form onsubmit="return confirm('Yakin akan menghapus data?')" action="{{ url('siswa/' . $item->nisn) }}" method="POST">
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
