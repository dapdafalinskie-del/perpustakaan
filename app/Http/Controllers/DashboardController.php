<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
{
    $jumlahBuku = Buku::count();
    $jumlahAnggota = Anggota::count();

    $jumlahDipinjam = Transaksi::where('status', 'Dipinjam')->count();
    $jumlahTerlambat = Transaksi::where('status', 'Terlambat')->count();

    $daftarTransaksi = Transaksi::with(['anggota', 'buku'])
        ->latest()
        ->limit(5)
        ->get();

    return view('dashboard', compact(
        'jumlahBuku',
        'jumlahAnggota',
        'jumlahDipinjam',
        'jumlahTerlambat',
        'daftarTransaksi'
    ));
}
}
