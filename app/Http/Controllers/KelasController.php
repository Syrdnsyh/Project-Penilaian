<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\Mengajar;
use App\Models\Siswa;
use App\Models\Jurusan;

class KelasController extends Controller
{
    public function index()
    {
        return view('kelas.index', [
            'kelas' => Kelas::all()
        ]);
    }

    public function create()
    {
        return view('kelas.create', [
            'jurusan' => Jurusan::all()
        ]);
    }

    public function store(Request $request)
    {
        $data_kelas = $request->validate([
            'nama_kelas' => ['required'],
            'jurusan_id' => ['required']
        ]);
        Kelas::create($data_kelas);
        return redirect('/kelas/index')->with('success', "Data berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit(Kelas $kelas)
    {
        return view('kelas.edit', [
            'kelas' => $kelas,
            'jurusan' => Jurusan::all()
        ]);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $data_kelas = $request->validate([
            'nama_kelas' => ['required'],
            'jurusan_id' => ['required']
        ]);
        $kelas->update($data_kelas);
        return redirect('/kelas/index')->with('success', "Data berhasil diubah");
    }

    public function destroy(Kelas $kelas)
    {
        $mengajar = Mengajar::where('kelas_id', $kelas->id)->first();
        $siswa = Siswa::where('kelas_id', $kelas->id)->first();

        if($mengajar){
            return back()->with('error', "$kelas->nama_kelas masih digunakan di menu mengajar");
        }

        if($siswa){
            return back()->with('error', "$kelas->nama_kelas masih digunakan di menu siswa");
        }

        $kelas->delete();
        return redirect('/kelas/index')->with('success', "Data berhasil dihapus");
    }
}
