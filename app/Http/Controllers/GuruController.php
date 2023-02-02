<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mengajar;

class GuruController extends Controller
{
    public function index()
    {
        return view('guru.index', [
            'guru' => Guru::all()
            //menampilkan data guru
        ]);
    }

    public function create()
    {
        return view('guru.create');
    }

    public function store(Request $request)
    {
        $data_guru = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
        Guru::create($data_guru);
        return redirect('/guru/index')->with('success', "Data Guru berhasil ditambah");
    }

    public function show($id)
    {
        //
    }

    public function edit(Guru $guru)
    {
        return view('guru.edit', ['guru' => $guru]);
    }

    public function update(Request $request, Guru $guru)
    {
        $data_guru = $request->validate([
            'nip' => 'required|numeric',
            'nama_guru' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'password' => 'required'
        ]);
        $guru->update($data_guru);
        return redirect('/guru/index')->with('success', "Data Guru berhasil diperbarui");
    }

    public function destroy(Guru $guru)
    {
        $mengajar = Mengajar::where('guru_id', $guru->id)->first();

        if($mengajar){
            return back()->with('error', "Data $guru->nama_guru masih digunakan di menu mengajar");
        }

        $guru->delete();
        return redirect('/guru/index')->with('success', "Data $guru->nama_guru berhasil dihapus");
    }
}
