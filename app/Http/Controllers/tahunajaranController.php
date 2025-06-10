<?php

namespace App\Http\Controllers;

use App\Models\tahunajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class tahunajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = tahunajaran::where('id_tahun_ajaran', 'like', "%$katakunci%")
                ->orWhere('tahun_mulai', 'like', "%$katakunci%")
                ->orWhere('tahun_selesai', 'like', "%$katakunci%")
                ->orWhere('status', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = tahunajaran::orderBy('id_tahun_ajaran', 'desc')->paginate(3);
        }
        return view('tahunajaran.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tahunajaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_tahun_ajaran', $request->id_tahun_ajaran);
        Session::flash('tahun_mulai', $request->tahun_mulai);
        Session::flash('tahun_selesai', $request->tahun_selesai);
        Session::flash('status', $request->status);

        $request->validate(
            [
                'id_tahun_ajaran' => 'required|integer|unique:tahunajaran,id_tahun_ajaran',
                'tahun_mulai' => 'required|digits:4|integer|min:1900|max:' . date("Y"),
                'tahun_selesai' => 'required|digits:4|integer|min:1900|max:' . date("Y"),
                'status' => 'required|in:AKTIF,TIDAK AKTIF',
            ],
            [
                'id_tahun_ajaran.required' => 'Id Tahun Ajaran harus diisi',
                'id_tahun_ajaran.integer' => 'Id Tahun Ajaran harus berupa angka',
                'id_tahun_ajaran.unique' => 'Id Tahun Ajaran sudah terdaftar',
                'tahun_mulai.required' => 'Tahun Mulai harus diisi',
                'tahun_mulai.digits' => 'Tahun Mulai harus berupa 4 digit angka',
                'tahun_mulai.min' => 'Tahun Mulai tidak boleh kurang dari 1900',
                'tahun_mulai.max' => 'Tahun Mulai tidak boleh lebih dari tahun ini',
                'tahun_selesai.required' => 'Tahun Selesai harus diisi',
                'tahun_selesai.digits' => 'Tahun Selesai harus berupa 4 digit angka',
                'tahun_selesai.min' => 'Tahun Selesai tidak boleh kurang dari 1900',
                'tahun_selesai.max' => 'Tahun Selesai tidak boleh lebih dari tahun ini',
                'status.required' => 'Status harus diisi',
            ]
        );
        $data = [
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
            'status' => $request->status,
        ];
        tahunajaran::create($data);
        return redirect()->to('tahunajaran')->with('success', 'Data Tahun Ajaran berhasil disimpan');
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
        $data = tahunajaran::where('id_tahun_ajaran', $id)->first();
        return view('tahunajaran.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'tahun_mulai' => 'required|digits:4|integer|min:1900|max:'. date("Y"),
                'tahun_selesai' => 'required|digits:4|integer|min:1900|max:'. date("Y"),
                'status' => 'required|in:AKTIF,TIDAK AKTIF',
            ],
            [
                'tahun_mulai.required' => 'Tahun Mulai harus diisi',
                'tahun_mulai.digits' => 'Tahun Mulai harus berupa 4 digit angka',
                'tahun_mulai.min' => 'Tahun Mulai tidak boleh kurang dari 1900',
                'tahun_mulai.max' => 'Tahun Mulai tidak boleh lebih dari tahun ini',
                'tahun_selesai.required' => 'Tahun Selesai harus diisi',
                'tahun_selesai.digits' => 'Tahun Selesai harus berupa 4 digit angka',
                'tahun_selesai.min' => 'Tahun Selesai tidak boleh kurang dari 1900',
                'tahun_selesai.max' => 'Tahun Selesai tidak boleh lebih dari tahun ini',
                'status.required' => 'Status harus diisi',
            ]
        );
        $data = [
            'tahun_mulai' => $request->tahun_mulai,
            'tahun_selesai' => $request->tahun_selesai,
            'status' => $request->status,
        ];
        tahunajaran::where('id_tahun_ajaran', $id)->update($data);
        return redirect()->to('tahunajaran')->with('success', 'Data Tahun Ajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        tahunajaran::where('id_tahun_ajaran', $id)->delete();
        return redirect()->to('tahunajaran')->with('success', 'Data Tahun Ajaran berhasil dihapus');
    }
}
