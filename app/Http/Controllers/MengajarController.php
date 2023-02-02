<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mengajar;
use App\Models\Kelas;
use App\Models\Mapel;
use App\Models\Guru;
use App\Models\Nilai;

class MengajarController extends Controller
{
    public function index()
    {
        return view('mengajar.index', [
            'mengajar' => Mengajar::all()
        ]);
    }

    public function create()
    {
        return view('mengajar.create', [
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function store(Request $request)
    {
        $data_mengajar = $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);
        Mengajar::create($data_mengajar);
        return redirect('/mengajar/index')->with('success', "Data berhasil ditambahkan");
    }

    public function show($id)
    {
        //
    }

    public function edit(Mengajar $mengajar)
    {
        return view('mengajar.edit', [
            'mengajar' => $mengajar,
            'guru' => Guru::all(),
            'mapel' => Mapel::all(),
            'kelas' => Kelas::all()
        ]);
    }

    public function update(Request $request, Mengajar $mengajar)
    {
        $data_mengajar = $request->validate([
            'guru_id' => 'required',
            'mapel_id' => 'required',
            'kelas_id' => 'required'
        ]);
        $mengajar->update($data_mengajar);
        return redirect('/mengajar/index')->with('success', "Data berhasil diubah");
    }

    public function destroy(Mengajar $mengajar)
    {
        // $nilai = Nilai::where('mengajar_id', $mengajar->id)->first();

        // if($mengajar){
        //     return back()->with('error', "Data ini masih digunakan di menu nilai");
        // }

        $mengajar->delete();
        return redirect('/mengajar/index')->with('success', "Data berhasil dihapus");
    }
}
