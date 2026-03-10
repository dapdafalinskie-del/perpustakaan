<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class TransaksiController extends Controller
{
    public function index(Request $request){
        $search = $request->search;

        $daftarTransaksi = Transaksi::with(['anggota', 'buku'])
            ->when($search, function ($query, $search) {

                $query->where('id_transaksi', 'like', "%{$search}%")
                
                ->orWhereHas('anggota', function ($q) use ($search) {
                    $q->where('id_anggota', 'like', "%{$search}%")
                    ->orWhere('nama', 'like', "%{$search}%")
                    ->orWhere('kelas', 'like', "%{$search}%");
                })

                ->orWhereHas('buku', function ($q) use ($search) {
                    $q->where('kode_buku', 'like', "%{$search}%")
                    ->orWhere('judul_buku', 'like', "%{$search}%");
                })

                ->orWhere('status', 'like', "%{$search}%");
            })
            ->get();

        return view('pages.transaksi.index', compact('daftarTransaksi'));
    }

    public function create(){
        $daftarBuku = Buku::whereNotIn('stok', [0])->get();
        $daftarAnggota = Anggota::get();

        return view('pages.transaksi.create', compact('daftarBuku', 'daftarAnggota'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'select-buku-value' => 'required',
            'select-anggota-value' => 'required',
        ]);

        $validated['id_buku'] = $validated['select-buku-value'];
        $validated['id_anggota'] = $validated['select-anggota-value'];

        $lastTransaksi = Transaksi::orderBy('id_transaksi', 'desc')->first();

        if ($lastTransaksi) {
            $lastNumber = (int) substr($lastTransaksi->id_transaksi, 3);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        $validated['id_transaksi'] = 'TRX' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        Transaksi::create($validated);

        $buku = Buku::find($validated['id_buku']);
        if(!$buku){
            return back()->with('error', 'Transaksi tidak dapat diselesaikan, buku yang dipilih tidak ditemukan.');
        }

        $buku->update([
            'stok' => $buku->stok - 1
            ]);

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function return($id){
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return back()->with('error', 'Transaksi tidak ditemukan.');
        }

        $denda = 0;

        $tanggalPinjam = Carbon::parse($transaksi->tanggal_pinjam)->startOfDay();
        $tanggalSekarang = Carbon::now()->startOfDay();

        $selisihHari = $tanggalPinjam->diffInDays($tanggalSekarang);

        if ($selisihHari > 5) {
            $hariTerlambat = $selisihHari - 5;
            $denda = $hariTerlambat * 1000;
        }

        $transaksi->update([
            'tanggal_kembali' => $tanggalSekarang,
            'denda' => $denda,
            'status' => $denda > 0 ? 'terlambat' : 'kembali'
        ]);

        $buku = Buku::find($transaksi->id_buku);

        if($buku){
            $buku->update([
                'stok' => $buku->stok + 1
            ]);
        }

        return back()->with('success', 'Buku berhasil dikembalikan!');
    }

}
