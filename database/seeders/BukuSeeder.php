<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('buku')->insert([
            [
                'kode_buku' => 'BK001',
                'judul_buku' => 'Pemrograman Dasar',
                'pengarang' => 'Andi Pratama',
                'penerbit' => 'Informatika',
                'tahun' => 2021,
                'kategori' => 'Teknologi',
                'rak' => 'A1',
                'stok' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_buku' => 'BK002',
                'judul_buku' => 'Basis Data',
                'pengarang' => 'Budi Santoso',
                'penerbit' => 'Erlangga',
                'tahun' => 2020,
                'kategori' => 'Teknologi',
                'rak' => 'A1',
                'stok' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_buku' => 'BK003',
                'judul_buku' => 'Matematika Diskrit',
                'pengarang' => 'Siti Rahma',
                'penerbit' => 'Gramedia',
                'tahun' => 2019,
                'kategori' => 'Pendidikan',
                'rak' => 'B2',
                'stok' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_buku' => 'BK004',
                'judul_buku' => 'Bahasa Indonesia',
                'pengarang' => 'Dewi Lestari',
                'penerbit' => 'Yudhistira',
                'tahun' => 2018,
                'kategori' => 'Bahasa',
                'rak' => 'C1',
                'stok' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'kode_buku' => 'BK005',
                'judul_buku' => 'Jaringan Komputer',
                'pengarang' => 'Rudi Hartono',
                'penerbit' => 'Informatika',
                'tahun' => 2022,
                'kategori' => 'Teknologi',
                'rak' => 'A2',
                'stok' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}