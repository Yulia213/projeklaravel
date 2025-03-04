<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Siswa;
use App\Models\Barang;

class PinjamanController extends Controller
{
    public function index(Request $request)
    {
        //Search
        $query = Pinjaman::query();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('id_pinjam', 'LIKE', "%{$search}%");
        }
        
        $pinjaman = $query->with('siswa')->paginate(100);

        return view('pinjaman.index', compact('pinjaman'));
    }

    //tambah data
    public function create()
    {
        $siswa = Siswa::all();
        $barang = Barang::all();
        
        return view('pinjaman.create', compact('siswa', 'barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|exists:siswa,nisn',
            'id_barang' => 'required|exists:barang,id_barang', 
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'status' => 'required|string',
            'jumlah_pinjam' => 'required|integer|min:1',
        ]);

        $barang = Barang::findOrFail($request->id_barang);

        if ($barang->stok < $request->jumlah_pinjam) {
            return redirect()->back()->with('error', 'Stok barang tidak mencukupi!');
        }

        $barang->stok -= $request->jumlah_pinjam;
        $barang->save();

        Pinjaman::create([
            'nisn' => $request->input('nisn'),
            'id_barang' => $request->input('id_barang'),
            'tanggal_pinjam' => $request->input('tanggal_pinjam'),
            'tanggal_kembali' => $request->input('tanggal_kembali'),
            'status' => $request->input('status'),
            'jumlah_pinjam' => $request->input('jumlah_pinjam'),
        ]);

        return redirect('/pinjaman')->with('success', 'Data Peminjaman berhasil ditambahkan!');
    }

    //edit data
    public function edit($id_pinjam)
    {
        $data = Pinjaman::findOrFail($id_pinjam);
        return view('pinjaman.edit', compact('data'));
    }

    public function update(Request $request, $id_pinjam)
    {
        $request->validate([
            'status' => 'required|in:dipinjam,dikembalikan',
        ]);

        $pinjaman = Pinjaman::findOrFail($id_pinjam);
        $barang = Barang::findOrFail($pinjaman->id_barang);

        if ($request->status === 'dikembalikan' && $pinjaman->status !== 'dikembalikan') {
            $barang->stok += $pinjaman->jumlah_pinjam;
            $barang->save();
        }

        $pinjaman->update(['status' => $request->status]);

        return redirect()->route('pinjaman.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    //hapus data
    public function destroy($id_pinjam)
    {
        $pinjaman = Pinjaman::findOrFail($id_pinjam);
        $barang = Barang::findOrFail($pinjaman->id_barang);

        if ($pinjaman->status === 'dipinjam') {
            $barang->stok += $pinjaman->jumlah_pinjam;
            $barang->save();
        }

        $pinjaman->delete();

        return redirect()->route('pinjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
