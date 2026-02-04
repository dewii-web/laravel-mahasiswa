<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; 
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Tampil Data (Read)
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::all(); 
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Form Tambah Data
     */
    public function create()
    {
        return view('mahasiswa.create');
    }

    /**
     * Simpan Data Baru (Store)
     */
    public function store(Request $request) 
    {
        Mahasiswa::create($request->all()); 
        return redirect()->route('mahasiswa.index'); 
    }

    /**
     * Form Edit Data
     */
    public function edit(string $id)
    {
        // Mencari data berdasarkan NIM, jika tidak ada muncul 404
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Proses Update Data
     */
    public function update(Request $request, string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    /**
     * Proses Hapus Data
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }

    public function show(string $id) { }
}