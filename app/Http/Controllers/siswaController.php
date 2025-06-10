<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class siswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = siswa::where('nisn', 'like', "%$katakunci%")
                ->orWhere('tanggal_lahir', 'like', "%$katakunci%")
                ->orWhere('id_siswa', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->orWhere('no_telepon', 'like', "%$katakunci%")
                ->orWhere('id_kelas', 'like', "%$katakunci%")
                ->orWhere('id_tahun_ajaran', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = siswa::orderBy('nisn', 'desc')->paginate(3);
        }
        return view('siswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelasList = Kelas::all();
        return view('siswa.create', compact('kelasList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_siswa', $request->id_siswa);
        Session::flash('nisn', $request->nisn);
        Session::flash('nama', $request->nama);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telepon', $request->no_telepon);
        Session::flash('id_kelas', $request->id_kelas);
        Session::flash('id_tahun_ajaran', $request->id_tahun_ajaran);

        $request->validate(
            [
                'id_siswa' => 'required|integer',
                'nisn' => 'required|integer|unique:siswa,nisn',
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
                'alamat' => 'required|string|max:500',
                'no_telepon' => 'required|string|max:15',
                'id_kelas' => 'required|integer',
                'id_tahun_ajaran' => 'required|integer'
            ],
            [
                'id_siswa.required' => 'ID Siswa harus diisi',
                'nisn.required' => 'NISN harus diisi',
                'nisn.integer' => 'NISN harus berupa angka',
                'nisn.unique' => 'NISN sudah terdaftar',
                'nama.required' => 'Nama harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
                'alamat.required' => 'Alamat harus diisi',
                'no_telepon.required' => 'No telepon harus diisi',
                'id_kelas.required' => 'Kelas harus dipilih',
                'id_tahun_ajaran.required' => 'Tahun ajaran harus dipilih'
            ]
        );
        $data = [
            'id_siswa' => $request->id_siswa,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_kelas' => $request->id_kelas,
            'id_tahun_ajaran' => $request->id_tahun_ajaran
        ];
        siswa::create($data);
        return redirect()->to('siswa')->with('success', 'Data siswa berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kelasList = Kelas::all();
        $data = Siswa::where('nisn', $id)->first();

        return view('siswa.edit', compact('kelasList', 'data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
                'alamat' => 'required|string|max:500',
                'no_telepon' => 'required|string|max:15',
                'id_kelas' => 'required|integer',
                'id_tahun_ajaran' => 'required|integer'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
                'alamat.required' => 'Alamat harus diisi',
                'no_telepon.required' => 'No telepon harus diisi',
                'id_kelas.required' => 'Kelas harus dipilih',
                'id_tahun_ajaran.required' => 'Tahun ajaran harus dipilih'
            ]
        );
        $data = [
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_kelas' => $request->id_kelas,
            'id_tahun_ajaran' => $request->id_tahun_ajaran
        ];
        siswa::where('nisn', $id)->update($data);
        return redirect()->to('siswa')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        siswa::where('nisn', $id)->delete();
        return redirect()->to('siswa')->with('success', 'Data siswa berhasil dihapus');
    }
}
