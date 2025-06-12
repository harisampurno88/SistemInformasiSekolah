<?php

namespace App\Http\Controllers;

use App\Models\jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class jadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $katakunci = $request->get('katakunci');
        if (strlen($katakunci)) {
            $data = jadwal::where('id_jadwal', 'like', "%$katakunci%")
                ->orWhere('id_kelas', 'like', "%$katakunci%")
                ->orWhere('id_guru', 'like', "%$katakunci%")
                ->orWhere('id_mata_pelajaran', 'like', "%$katakunci%")
                ->orWhere('hari', 'like', "%$katakunci%")
                ->orWhere('jam_mulai', 'like', "%$katakunci%")
                ->orWhere('jam_selesai', 'like', "%$katakunci%")
                ->paginate(3);
            $data->appends(['katakunci' => $katakunci]);
        } else {
            $data = jadwal::orderBy('id_jadwal', 'desc')->paginate(3);
        }
        return view('jadwal.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('id_jadwal', $request->id_jadwal);
        Session::flash('id_kelas', $request->id_kelas);
        Session::flash('id_guru', $request->id_guru);
        Session::flash('id_mata_pelajaran', $request->id_mata_pelajaran);
        Session::flash('hari', $request->hari);
        Session::flash('jam_mulai', $request->jam_mulai);
        Session::flash('jam_selesai', $request->jam_selesai);

        $request->validate(
            [
                'id_jadwal' => 'required|integer|unique:jadwal,id_jadwal',
                'id_kelas' => 'required|integer',
                'id_guru' => 'required|integer',
                'id_mata_pelajaran' => 'required|integer',
                'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai'
            ],
            [
                'id_jadwal.required' => 'ID Jadwal harus diisi',
                'id_jadwal.unique' => 'ID Jadwal sudah terdaftar',
                'id_kelas.required' => 'ID Kelas harus diisi',
                'id_guru.required' => 'ID Guru harus diisi',
                'id_mata_pelajaran.required' => 'ID Mata Pelajaran harus diisi',
                'hari.required' => 'Hari harus diisi',
                'hari.in' => 'Hari harus salah satu dari Senin, Selasa, Rabu, Kamis, Jumat, atau Sabtu',
                'jam_mulai.required' => 'Jam Mulai harus diisi',
                'jam_selesai.required' => 'Jam Selesai harus diisi',
                'jam_selesai.after' => 'Jam Selesai harus setelah Jam Mulai',
            ]
        );
        $data = [
            'id_jadwal' => $request->id_jadwal,
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ];
        jadwal::create($data);
        return redirect()->to('jadwal')->with('success', 'Data Jadwal berhasil disimpan');
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
        $data = jadwal::where('id_jadwal', $id)->first();
        return view('jadwal.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'id_kelas' => 'required|integer',
                'id_guru' => 'required|integer',
                'id_mata_pelajaran' => 'required|integer',
                'hari' => 'required|in:Senin,Selasa,Rabu,Kamis,Jumat,Sabtu',
                'jam_mulai' => 'required|date_format:H:i',
                'jam_selesai' => 'required|date_format:H:i|after:jam_mulai'
            ],
            [
                'id_kelas.required' => 'ID Kelas harus diisi',
                'id_guru.required' => 'ID Guru harus diisi',
                'id_mata_pelajaran.required' => 'ID Mata Pelajaran harus diisi',
                'hari.required' => 'Hari harus diisi',
                'hari.in' => 'Hari harus salah satu dari Senin, Selasa, Rabu, Kamis, Jumat, atau Sabtu',
                'jam_mulai.required' => 'Jam Mulai harus diisi',
                'jam_selesai.required' => 'Jam Selesai harus diisi',
                'jam_selesai.after' => 'Jam Selesai harus setelah Jam Mulai',
            ]
        );
        $data = [
            'id_kelas' => $request->id_kelas,
            'id_guru' => $request->id_guru,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai
        ];
        jadwal::where('id_jadwal', $id)->update($data);
        return redirect()->to('jadwal')->with('success', 'Data Jadwal berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        jadwal::where('id_jadwal', $id)->delete();
        return redirect()->to('jadwal')->with('success', 'Data Jadwal berhasil dihapus');
    }
}
