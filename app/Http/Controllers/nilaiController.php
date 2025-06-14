<?php

namespace App\Http\Controllers;

use App\Models\nilai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class nilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = nilai::where('id_nilai', 'like', "%$katakunci%")
                ->orWhere('nisn', 'like', "%$katakunci%")
                ->orWhere('id_mata_pelajaran', 'like', "%$katakunci%")
                ->orWhere('id_tahun_ajaran', 'like', "%$katakunci%")
                ->orWhere('nilai_tugas', 'like', "%$katakunci%")
                ->orWhere('nilai_uts', 'like', "%$katakunci%")
                ->orWhere('nilai_uas', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = nilai::orderBy('id_nilai', 'desc')->paginate(3);
        }
        return view('nilai.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_nilai', $request->id_nilai);
        Session::flash('nisn', $request->nisn);
        Session::flash('id_mata_pelajaran', $request->id_mata_pelajaran);
        Session::flash('id_tahun_ajaran', $request->id_tahun_ajaran);
        Session::flash('nilai_tugas', $request->nilai_tugas);
        Session::flash('nilai_uts', $request->nilai_uts);
        Session::flash('nilai_uas', $request->nilai_uas);

        $request->validate(
            [
                'id_nilai' => 'required||integer|unique:nilai,id_nilai',
                'nisn' => 'required|integer',
                'id_mata_pelajaran' => 'required|integer',
                'id_tahun_ajaran' => 'required|integer',
                'nilai_tugas' => 'required|numeric|min:0|max:100',
                'nilai_uts' => 'required|numeric|min:0|max:100',
                'nilai_uas' => 'required|numeric|min:0|max:100'
            ],
            [
                'id_nilai.required' => 'ID Nilai harus diisi',
                'id_nilai.unique' => 'ID Nilai sudah terdaftar',
                'nisn.required' => 'ID Siswa harus diisi',
                'id_mata_pelajaran.required' => 'ID Mata Pelajaran harus diisi',
                'id_tahun_ajaran.required' => 'ID Tahun Ajaran harus diisi',
                'nilai_tugas.required' => 'Nilai Tugas harus diisi',
                'nilai_tugas.min' => 'Nilai Tugas minimal 0',
                'nilai_tugas.max' => 'Nilai Tugas maksimal 100',
                'nilai_uts.required' => 'Nilai UTS harus diisi',
                'nilai_uts.min' => 'Nilai UTS minimal 0',
                'nilai_uts.max' => 'Nilai UTS maksimal 100',
                'nilai_uas.required' => 'Nilai UAS harus diisi',
                'nilai_uas.min' => 'Nilai UAS minimal 0',
                'nilai_uas.max' => 'Nilai UAS maksimal 100',
            ]
        );
        $data = [
            'id_nilai' => $request->id_nilai,
            'nisn' => $request->nisn,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas
        ];
        nilai::create($data);
        return redirect()->to('nilai')->with('success', 'Data Nilai berhasil disimpan');
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
        $data = nilai::where('id_nilai', $id)->first();
        return view('nilai.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request->validate(
            [
                'nisn' => 'required|integer|',
                'id_mata_pelajaran' => 'required|integer',
                'id_tahun_ajaran' => 'required|integer',
                'nilai_tugas' => 'required|numeric|min:0|max:100',
                'nilai_uts' => 'required|numeric|min:0|max:100',
                'nilai_uas' => 'required|numeric|min:0|max:100'
            ],
            [
                'nisn.required' => 'ID Siswa harus diisi',
                'id_mata_pelajaran.required' => 'ID Mata Pelajaran harus diisi',
                'id_tahun_ajaran.required' => 'ID Tahun Ajaran harus diisi',
                'nilai_tugas.required' => 'Nilai Tugas harus diisi',
                'nilai_tugas.min' => 'Nilai Tugas minimal 0',
                'nilai_tugas.max' => 'Nilai Tugas maksimal 100',
                'nilai_uts.required' => 'Nilai UTS harus diisi',
                'nilai_uts.min' => 'Nilai UTS minimal 0',
                'nilai_uts.max' => 'Nilai UTS maksimal 100',
                'nilai_uas.required' => 'Nilai UAS harus diisi',
                'nilai_uas.min' => 'Nilai UAS minimal 0',
                'nilai_uas.max' => 'Nilai UAS maksimal 100',
            ]
        );
        $data = [
            'nisn' => $request->nisn,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas
        ];
        nilai::where('id_nilai', $id)->update($data);
        return redirect()->to('nilai')->with('success', 'Data Nilai berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        nilai::where('id_nilai', $id)->delete();
        return redirect()->to('nilai')->with('success', 'Data Nilai berhasil dihapus');
    }
}
