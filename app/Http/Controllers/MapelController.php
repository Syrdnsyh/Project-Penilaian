<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;
use App\Models\Mengajar;

class MapelController extends Controller
{
    public function index()
    {
        return view('mapel.index', [
            'mapel' => Mapel::all()
        ]);
    }

    public function create()
    {
        return view('mapel.create');
    }

    public function store(Request $request)
    {
        $mapel = $request->validate([
            'nama_mapel' => 'required'
        ]);
        Mapel::create($mapel);
        return redirect('/mapel/index')->with('success', "Mata Pelajaran berhasil ditambah");
    }

    public function show($id)
    {
        //
    }

    public function edit(Mapel $mapel)
    {
        return view('mapel.edit', ['mapel' => $mapel]);
    }

    public function update(Request $request, Mapel $mapel)
    {
        $data_mapel = $request->validate([
            'nama_mapel' => 'required'
        ]);
        $mapel->update($data_mapel);
        return redirect('/mapel/index')->with('success', "Mata Pelajaran berhasil diperbarui");
    }

    public function destroy(Mapel $mapel)
    {
        $mengajar = Mengajar::where('mapel_id', $mapel->id)->first();

        if($mengajar){
            return back()->with('error', "$mapel->nama_mapel masih digunakan di menu mwngajar");
        }

        $mapel->delete();
        return redirect('/mapel/index')->with('success', "Data berhasil dihapus");
    }
}
