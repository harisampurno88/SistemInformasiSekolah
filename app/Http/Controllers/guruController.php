<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class guruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = guru::where('nip', 'like', "%$katakunci%")
                ->orWhere('tanggal_lahir', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('jenis_kelamin', 'like', "%$katakunci%")
                ->orWhere('alamat', 'like', "%$katakunci%")
                ->orWhere('no_telepon', 'like', "%$katakunci%")
                ->orWhere('id_mata_pelajaran', 'like', "%$katakunci%")
                ->orWhere('id_jabatan', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = guru::orderBy('nip', 'desc')->paginate(3);
        }
        return view('guru.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('tanggal_lahir', $request->tanggal_lahir);
        Session::flash('jenis_kelamin', $request->jenis_kelamin);
        Session::flash('alamat', $request->alamat);
        Session::flash('no_telepon', $request->no_telepon);
        Session::flash('id_mata_pelajaran', $request->id_mata_pelajaran);
        Session::flash('id_jabatan', $request->id_jabatan);

        $request->validate(
            [
                'nip' => 'required|integer|unique:guru,nip',
                'nama' => 'required|string|max:255',
                'tanggal_lahir' => 'required|date',
                'jenis_kelamin' => 'required|string|in:Laki-Laki,Perempuan',
                'alamat' => 'required|string|max:500',
                'no_telepon' => 'required|string|max:15',
                'id_mata_pelajaran' => 'required|integer',
                'id_jabatan' => 'required|integer|'
            ],
            [
                'nip.required' => 'NIP harus diisi',
                'nip.integer' => 'NIP harus berupa angka',
                'nip.unique' => 'NIP sudah terdaftar',
                'nama.required' => 'Nama harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
                'alamat.required' => 'Alamat harus diisi',
                'no_telepon.required' => 'No telepon harus diisi',
                'id_mata_pelajaran' => 'Mata Pelajaran harus dipilih',
                'id_jabatan' => 'Id Jabatan harus dipilih'
            ]
        );
        $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_jabatan' => $request->id_jabatan
        ];
        guru::create($data);
        return redirect()->to('guru')->with('success', 'Data guru berhasil disimpan');
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
        $data = guru::where('nip', $id)->first();
        return view('guru.edit')->with('data', $data);
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
                'id_mata_pelajaran' => 'required|integer',
                'id_jabatan' => 'required|integer|'
            ],
            [
                'nama.required' => 'Nama harus diisi',
                'tanggal_lahir.required' => 'Tanggal lahir harus diisi',
                'jenis_kelamin.required' => 'Jenis kelamin harus dipilih',
                'alamat.required' => 'Alamat harus diisi',
                'no_telepon.required' => 'No telepon harus diisi',
                'id_mata_pelajaran' => 'Mata Pelajaran harus dipilih',
                'id_jabatan' => 'Id Jabatan harus dipilih'
            ]
        );
        $data = [
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_jabatan' => $request->id_jabatan
        ];
        guru::where('nip', $id)->update($data);
        return redirect()->to('guru')->with('success', 'Data guru berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        guru::where('nip', $id)->delete();
        return redirect()->to('guru')->with('success', 'Data guru berhasil dihapus');
    }
}
