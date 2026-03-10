<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    public function run(): void
    {
        $ag1 = DB::table('anggota')->where('id_anggota', 'AG001')->value('id');
        $ag2 = DB::table('anggota')->where('id_anggota', 'AG002')->value('id');
        $ag3 = DB::table('anggota')->where('id_anggota', 'AG003')->value('id');
        $ag4 = DB::table('anggota')->where('id_anggota', 'AG004')->value('id');
        $ag5 = DB::table('anggota')->where('id_anggota', 'AG005')->value('id');

        $bk1 = DB::table('buku')->where('kode_buku', 'BK001')->value('id');
        $bk2 = DB::table('buku')->where('kode_buku', 'BK002')->value('id');
        $bk3 = DB::table('buku')->where('kode_buku', 'BK003')->value('id');
        $bk5 = DB::table('buku')->where('kode_buku', 'BK005')->value('id');

        DB::table('transaksi')->insert([
            [
                'id_transaksi' => 'TRX001',
                'tanggal_pinjam' => '2024-01-10',
                'tanggal_kembali' => '2024-01-15',
                'id_anggota' => $ag1,
                'id_buku' => $bk1,
                'denda' => 0,
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 'TRX002',
                'tanggal_pinjam' => '2024-01-12',
                'tanggal_kembali' => '2024-01-20',
                'id_anggota' => $ag2,
                'id_buku' => $bk2,
                'denda' => 5000,
                'status' => 'terlambat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 'TRX003',
                'tanggal_pinjam' => '2024-01-13',
                'tanggal_kembali' => '2024-01-18',
                'id_anggota' => $ag3,
                'id_buku' => $bk3,
                'denda' => 0,
                'status' => 'kembali',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 'TRX004',
                'tanggal_pinjam' => '2024-01-14',
                'tanggal_kembali' => null,
                'id_anggota' => $ag4,
                'id_buku' => $bk1,
                'denda' => 0,
                'status' => 'dipinjam',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_transaksi' => 'TRX005',
                'tanggal_pinjam' => '2024-01-15',
                'tanggal_kembali' => '2024-01-25',
                'id_anggota' => $ag5,
                'id_buku' => $bk5,
                'denda' => 10000,
                'status' => 'terlambat',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}