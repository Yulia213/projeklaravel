<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        //Search
        $query = Siswa::query();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nisn', 'LIKE', "%{$search}%");
        }
        
        
        $siswa = $query->paginate(100);

        
        return view('siswa.index', compact('siswa'));
    }

    //tambah data
    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nisn' => 'required|string|max:255|unique:siswa,nisn',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        Siswa::create($validated);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan!');
    }

    //hapus data
    public function destroy($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->first();

        if ($siswa) {
            $siswa->delete();
            return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus.');
        }

        return redirect()->route('siswa.index')->with('error', 'Siswa tidak ditemukan.');
    }

    //edit data
    public function edit($nisn)
    {
        $siswa = Siswa::where('nisn', $nisn)->firstOrFail();
        return view('siswa.edit', compact('siswa'));
    }

    
    public function update(Request $request, $nisn)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
        ]);

        $siswa = Siswa::where('nisn', $nisn)->firstOrFail();
        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }
}
