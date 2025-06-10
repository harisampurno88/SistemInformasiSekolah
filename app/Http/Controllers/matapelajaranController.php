<?php

namespace App\Http\Controllers;

use App\Models\matapelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class matapelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = matapelajaran::where('id_mata_pelajaran', 'like', "%$katakunci%")
                ->orWhere('nama_mata_pelajaran', 'like', "%$katakunci%")
                ->orWhere('kkm', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = matapelajaran::orderBy('id_mata_pelajaran', 'desc')->paginate(3);
        }
        return view('matapelajaran.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matapelajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_mata_pelajaran', $request->id_mata_pelajaran);
        Session::flash('nama_mata_pelajaran', $request->nama_mata_pelajaran);
        Session::flash('kkm', $request->kkm);

        $request->validate(
            [
                'id_mata_pelajaran' => 'required|integer|unique:matapelajaran,id_mata_pelajaran',
                'nama_mata_pelajaran' => 'required|string|max:255',
                'kkm' => 'required|integer|min:0|max:100',
            ],
            [
                'id_mata_pelajaran.required' => 'Id Mata Pelajaran harus diisi',
                'id_mata_pelajaran.integer' => 'Id Mata Pelajaran harus berupa angka',
                'id_mata_pelajaran.unique' => 'Id Mata Pelajaran sudah terdaftar',
                'nama_mata_pelajaran.required' => 'Nama Mata Pelajaran harus diisi',
                'kkm.required' => 'KKM harus diisi',
                'kkm.min' => 'KKM tidak boleh kurang dari 0',
                'kkm.max' => 'KKM tidak boleh lebih dari 100',
            ]
        );
        $data = [
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            'kkm' => $request->kkm,
        ];
        matapelajaran::create($data);
        return redirect()->to('matapelajaran')->with('success', 'Data Mata Pelajaran berhasil disimpan');
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
        $data = matapelajaran::where('id_mata_pelajaran', $id)->first();
        return view('matapelajaran.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'nama_mata_pelajaran' => 'required|string|max:255',
                'kkm' => 'required|integer|min:0|max:100',
            ],
            [
                'nama_mata_pelajaran.required' => 'Nama Mata Pelajaran harus diisi',
                'kkm.required' => 'KKM harus diisi',
                'kkm.min' => 'KKM tidak boleh kurang dari 0',
                'kkm.max' => 'KKM tidak boleh lebih dari 100',
            ]
        );
        $data = [
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            'kkm' => $request->kkm,
        ];
        matapelajaran::where('id_mata_pelajaran', $id)->update($data);
        return redirect()->to('matapelajaran')->with('success', 'Data Mata Pelajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         matapelajaran::where('id_mata_pelajaran', $id)->delete();
        return redirect()->to('matapelajaran')->with('success', 'Data Mata Pelajaran berhasil dihapus');
    }
}
