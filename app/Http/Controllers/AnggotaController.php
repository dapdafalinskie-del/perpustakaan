<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $daftarAnggota = Anggota::when($search, function ($query, $search) {
            $query->where('id_anggota', 'like', "%{$search}%")
                ->orWhere('nama', 'like', "%{$search}%")
                ->orWhere('kelas', 'like', "%{$search}%")
                ->orWhere('jurusan', 'like', "%{$search}%")
                ->orWhere('no_hp', 'like', "%{$search}%");
        })->get();

        return view('pages.anggota.index', compact('daftarAnggota'));
    }

    public function create(){
        return view('pages.anggota.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'nama' => 'required',
            'select-jenis-kelamin-value' => 'required|in:L,P',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|regex:/^[0-9]+$/|min:10|max:15' 
        ], [
            'nama.required' => 'Nama anggota wajib diisi.',

            'select-jenis-kelamin-value.required' => 'Jenis kelamin wajib dipilih.',
            'select-jenis-kelamin-value.in' => 'Jenis kelamin harus L atau P.',

            'kelas.required' => 'Kelas wajib diisi.',

            'jurusan.required' => 'Jurusan wajib diisi.',

            'alamat.required' => 'Alamat wajib diisi.',

            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka.',
            'no_hp.min' => 'Nomor HP minimal 10 digit.',
            'no_hp.max' => 'Nomor HP maksimal 15 digit.'
        ]);

        $validated['jenis_kelamin'] = $validated['select-jenis-kelamin-value'];

        $lastAnggota = Anggota::orderBy('id_anggota', 'desc')->first();

        if ($lastAnggota) {
            $lastNumber = (int) substr($lastAnggota->id_anggota, 2);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $validated['id_anggota'] = 'AG' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
        
        Anggota::create($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id){
        $anggota = Anggota::find($id);
        if(!$anggota){
            return back()->with('error', 'Anggota tidak ditemukan.');
        }

        return view('pages.anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id){
        $anggota = Anggota::find($id);
        if(!$anggota){
            return back()->with('error', 'Anggota tidak ditemukan.');
        }

        $validated = $request->validate([
            'nama' => 'required',
            'select-jenis-kelamin-value' => 'required|in:L,P',
            'kelas' => 'required',
            'jurusan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required|regex:/^[0-9]+$/|min:10|max:15' 
        ], [
            'nama.required' => 'Nama anggota wajib diisi.',

            'select-jenis-kelamin-value.required' => 'Jenis kelamin wajib dipilih.',
            'select-jenis-kelamin-value.in' => 'Jenis kelamin harus L atau P.',

            'kelas.required' => 'Kelas wajib diisi.',

            'jurusan.required' => 'Jurusan wajib diisi.',

            'alamat.required' => 'Alamat wajib diisi.',

            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.regex' => 'Nomor HP hanya boleh berisi angka.',
            'no_hp.min' => 'Nomor HP minimal 10 digit.',
            'no_hp.max' => 'Nomor HP maksimal 15 digit.'
        ]);

        $validated['jenis_kelamin'] = $validated['select-jenis-kelamin-value'];
        
        $anggota->update($validated);

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id){
        $anggota = Anggota::find($id);
        if(!$anggota){
            return back()->with('error', 'Anggota tidak ditemukan.');
        }

        $anggota->delete();

        return back()->with('success', 'Anggota berhasil dihapus!');
    }
}

