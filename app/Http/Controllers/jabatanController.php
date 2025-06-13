<?php

namespace App\Http\Controllers;

use App\Models\jabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class jabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = jabatan::where('id_jabatan', 'like', "%$katakunci%")
                ->orWhere('nama_jabatan', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = jabatan::orderBy('id_jabatan', 'desc')->paginate(3);
        }
        return view('jabatan.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_jabatan', $request->id_jabatan);
        Session::flash('nama_jabatan', $request->nama_jabatan);

        $request->validate(
            [
                'id_jabatan' => 'required|integer|unique:jabatan,id_jabatan',
                'nama_jabatan' => 'required|string|max:100|unique:jabatan,nama_jabatan',
            ],
            [
                'id_jabatan.required' => 'Id Jabatan harus diisi',
                'id_jabatan.unique' => 'Id Jabatan sudah terdaftar',
                'nama_jabatan.required' => 'Nama Jabatan harus diisi',
                'nama_jabatan.max' => 'Nama Jabatan tidak boleh lebih dari 100 karakter',
                'nama_jabatan.unique' => 'Nama Jabatan sudah terdaftar',
            ]
        );
        $data = [
            'id_jabatan' => $request->id_jabatan,
            'nama_jabatan' => $request->nama_jabatan,
        ];
        jabatan::create($data);
        return redirect()->to('jabatan')->with('success', 'Data Jabatan berhasil disimpan');
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
        $data = jabatan::where('id_jabatan', $id)->first();
        return view('jabatan.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'nama_jabatan' => 'required|string|max:100|unique:jabatan,nama_jabatan'
            ],
            [
                'nama_jabatan.required' => 'Nama Jabatan harus diisi',
                'nama_jabatan.max' => 'Nama Jabatan tidak boleh lebih dari 100 karakter',
                'nama_jabatan.unique' => 'Nama Jabatan sudah terdaftar',
            ]
        );
        $data = [
            'nama_jabatan' => $request->nama_jabatan,
        ];
        jabatan::where('id_jabatan', $id)->update($data);
        return redirect()->to('jabatan')->with('success', 'Data Jabatan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jabatan::where('id_jabatan', $id)->delete();
        return redirect()->to('jabatan')->with('success', 'Data Jabatan berhasil dihapus');
    }
}
