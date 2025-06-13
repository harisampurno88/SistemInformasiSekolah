<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class kelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = kelas::where('id_kelas', 'like', "%$katakunci%")
                ->orWhere('nama_kelas', 'like', "%$katakunci%")
                ->orWhere('tingkat', 'like', "%$katakunci%")
                ->orWhere('jurusan', 'like', "%$katakunci%")
                ->orWhere('id_guru', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = kelas::orderBy('id_kelas', 'desc')->paginate(3);
        }
        return view('kelas.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_kelas', $request->id_kelas);
        Session::flash('nama_kelas', $request->nama_kelas);
        Session::flash('tingkat', $request->tingkat);
        Session::flash('jurusan', $request->jurusan);
        Session::flash('id_guru', $request->id_guru);

        $request->validate(
            [
                'id_kelas' => 'required|integer|unique:kelas,id_kelas',
                'nama_kelas' => 'required|string|max:255',
                'tingkat' => 'required|string|in:X,XI,XII',
                'jurusan' => 'required|string|max:255',
                'id_guru' => 'required|integer',
            ],
            [
                'id_kelas.required' => 'Id Kelas harus diisi',
                'id_kelas.integer' => 'Id Kelas harus berupa angka',
                'id_kelas.unique' => 'Id Kelas sudah terdaftar',
                'nama_kelas.required' => 'Nama Kelas harus diisi',
                'tingkat.required' => 'Tingkat harus dipilih',
                'jurusan' => 'Jurusan harus diisi',
                'id_guru' => 'id _wali_kelas harus diisi',
            ]
        );
        $data = [
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'id_guru' => $request->id_guru,
        ];
        kelas::create($data);
        return redirect()->to('kelas')->with('success', 'Data kelas berhasil disimpan');
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
        $data = kelas::where('id_kelas', $id)->first();
        return view('kelas.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama_kelas' => 'required|string|max:255',
                'tingkat' => 'required|string|in:X,XI,XII',
                'jurusan' => 'required|string|max:255',
                'id_guru' => 'required|integer',
            ],
            [
                'nama_kelas.required' => 'Nama Kelas harus diisi',
                'tingkat.required' => 'Tingkat harus dipilih',
                'jurusan' => 'Jurusan harus diisi',
                'id_guru' => 'id_guru harus diisi',
            ]
        );
        $data = [
            'nama_kelas' => $request->nama_kelas,
            'tingkat' => $request->tingkat,
            'jurusan' => $request->jurusan,
            'id_guru' => $request->id_guru,
        ];
        kelas::where('id_kelas', $id)->update($data);
        return redirect()->to('kelas')->with('success', 'Data kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kelas = Kelas::where('id_kelas', $id)->firstOrFail();

        // Cek apakah masih ada siswa terkait
        if ($kelas->siswa()->exists()) {
            return redirect()->to('kelas')->with('error', 'Tidak bisa menghapus kelas karena masih memiliki siswa.');
        }

        // Jika tidak ada siswa, lanjutkan hapus
        kelas::where('id_kelas', $id)->delete();
        return redirect()->to('kelas')->with('success', 'Data kelas berhasil dihapus');
    }
}
