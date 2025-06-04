 @extends('layout.template')
 <!-- START DATA -->
 @section('content')
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <!-- FORM PENCARIAN -->
         <div class="pb-3">
             <form class="d-flex" action="" method="get">
                 <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}"
                     placeholder="Masukkan kata kunci" aria-label="Search">
                 <button class="btn btn-secondary" type="submit">Cari</button>
             </form>
         </div>

         <!-- TOMBOL TAMBAH DATA -->
         <div class="pb-3">
             <a href='' class="btn btn-primary">+ Tambah Data</a>
         </div>

         <table class="table table-striped">
             <thead>
                 <tr>
                     <th class="col-md-1">NISN</th>
                     <th class="col-md-3">Nama Siswa</th>
                     <th class="col-md-4">Tanggal Lahir</th>
                     <th class="col-md-2">Jenis Kelamin</th>
                     <th class="col-md-2">Alamat</th>
                     <th class="col-md-2">No Telepon</th>
                     <th class="col-md-2">Id Kelas</th>
                     <th class="col-md-2">Id Tahun Ajaran</th>
                 </tr>
             </thead>
             <tbody>
                 <tr>
                     <td>2308</td>
                     <td>Prapto</td>
                     <td>18 September 2020</td>
                     <td>Laki Laki</td>
                     <td>Pantai Gading</td>
                     <td>0985 9000 0000</td>
                     <td>02</td>
                     <td>2020</td>
                     <td>
                         <a href='' class="btn btn-warning btn-sm">Edit</a>
                         <a href='' class="btn btn-danger btn-sm">Del</a>
                     </td>
                 </tr>
             </tbody>
         </table>

     </div>
 @endsection
 <!-- AKHIR DATA -->
