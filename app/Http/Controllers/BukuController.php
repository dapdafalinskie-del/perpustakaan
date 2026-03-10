<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $daftarBuku = Buku::when($search, function ($query, $search) {
            $query->where('kode_buku', 'like', "%{$search}%")
                ->orWhere('judul_buku', 'like', "%{$search}%")
                ->orWhere('pengarang', 'like', "%{$search}%")
                ->orWhere('penerbit', 'like', "%{$search}%")
                ->orWhere('tahun', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%")
                ->orWhere('rak', 'like', "%{$search}%");
        })->get();

        return view('pages.buku.index', compact('daftarBuku'));
    }

    public function create(){
        return view('pages.buku.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required|digits:4',
            'kategori' => 'required',
            'rak' => 'required',
            'stok' => 'required|integer|min:0'
        ], [
            'judul_buku.required' => 'Judul buku wajib diisi.',
            
            'pengarang.required' => 'Nama pengarang wajib diisi.',
            
            'penerbit.required' => 'Nama penerbit wajib diisi.',
            
            'tahun.required' => 'Tahun terbit wajib diisi.',
            'tahun.digits' => 'Tahun terbit harus terdiri dari 4 angka.',
            
            'kategori.required' => 'Kategori buku wajib dipilih.',
            
            'rak.required' => 'Rak buku wajib diisi.',
            
            'stok.required' => 'Stok buku wajib diisi.',
            'stok.integer' => 'Stok buku harus berupa angka.',
            'stok.min' => 'Stok buku tidak boleh kurang dari 0.'
        ]);

        $lastBook = Buku::orderBy('kode_buku', 'desc')->first();

        if ($lastBook) {
            $lastNumber = (int) substr($lastBook->kode_buku, 2);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $validated['kode_buku'] = 'BK' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        Buku::create($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id){
        $buku = Buku::find($id);
        if(!$buku){
            return back()->with('error', 'Buku tidak ditemukan!');
        }

        return view('pages.buku.edit', compact('buku'));

    }

    public function update(Request $request, $id){
        $buku = Buku::find($id);
        if(!$buku){
            return back()->with('error', 'Buku tidak ditemukan!');
        }

        $validated = $request->validate([
            'judul_buku' => 'required',
            'pengarang' => 'required',
            'penerbit' => 'required',
            'tahun' => 'required',
            'kategori' => 'required',
            'rak' => 'required', 
            'stok' => 'required'
        ]);

        $buku->update($validated);

        return redirect()->route('buku.index')
            ->with('success', 'Buku berhasil diperbarui!');
    }

    public function destroy($id){
        $buku = Buku::find($id);
        if(!$buku){
            return back()->with('error', 'Buku tidak ditemukan!');
        }

        $buku->delete();

        return back()->with('success', 'Buku berhasil dihapus!');
    }
}
