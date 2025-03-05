<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang; 

class BarangController extends Controller
{
    public function index(Request $request)
    {
        //Search
        $query = Barang::query();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id_barang', 'LIKE', "%{$search}%");
        }
        
        
        $barang = $query->paginate(100);

       
        return view('barang.index', compact('barang'));
    }

    // tambah data
    public function create()
    {
        return view('barang.create');  
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:1',
        ]);

        
        Barang::create($validated);

        return redirect('/barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    //hapus data
    public function destroy($id)
    {
        $item = Barang::where('id_barang', $id)->first();

        if ($item) {
            $item->delete();
            return redirect()->route('barang.index')->with('success', 'Item berhasil dihapus.');
        }

        return redirect()->route('barang.index')->with('error', 'Item tidak ditemukan.');
    }

    //edit data
    public function edit($id_barang)
    {
        $data = Barang::findOrFail($id_barang);
        return view('barang.edit', compact('data'));
    }

    
    public function update(Request $request, $id_barang)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jenis_barang' => 'required|string|max:255',
            'stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id_barang);
        $barang->update($request->all());    

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }
}
