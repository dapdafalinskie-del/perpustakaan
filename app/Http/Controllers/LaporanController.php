<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function buku(){
        $daftarBuku = Buku::get();

        $pdf = Pdf::loadView('pages.pdf.buku', compact('daftarBuku'));

        return $pdf->stream('laporan-buku.pdf');
    }

    public function anggota(){
        $daftarAnggota = Anggota::get();

        $pdf = Pdf::loadView('pages.pdf.anggota', compact('daftarAnggota'));

        return $pdf->stream('laporan-anggota.pdf');
    }

    public function transaksi(){
        $daftarTransaksi = Transaksi::get();

        $pdf = Pdf::loadView('pages.pdf.transaksi', compact('daftarTransaksi'));

        return $pdf->stream('laporan-transaksi.pdf');
    }
}
