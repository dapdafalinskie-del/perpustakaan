<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anggota')->insert([
            [
                'id_anggota' => 'AG001',
                'nama' => 'Ahmad Fauzi',
                'jenis_kelamin' => 'L',
                'kelas' => 'XI RPL 1',
                'jurusan' => 'RPL',
                'alamat' => 'Jl. Melati 1',
                'no_hp' => '081234567890',
                'tanggal_daftar' => '2023-07-10',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_anggota' => 'AG002',
                'nama' => 'Siti Aisyah',
                'jenis_kelamin' => 'P',
                'kelas' => 'XI RPL 2',
                'jurusan' => 'RPL',
                'alamat' => 'Jl. Mawar 5',
                'no_hp' => '081234567891',
                'tanggal_daftar' => '2023-07-11',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_anggota' => 'AG003',
                'nama' => 'Budi Setiawan',
                'jenis_kelamin' => 'L',
                'kelas' => 'X TKJ 1',
                'jurusan' => 'TKJ',
                'alamat' => 'Jl. Kenanga 2',
                'no_hp' => '081234567892',
                'tanggal_daftar' => '2023-07-12',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_anggota' => 'AG004',
                'nama' => 'Rina Kartika',
                'jenis_kelamin' => 'P',
                'kelas' => 'XII RPL 1',
                'jurusan' => 'RPL',
                'alamat' => 'Jl. Anggrek 3',
                'no_hp' => '081234567893',
                'tanggal_daftar' => '2023-07-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'id_anggota' => 'AG005',
                'nama' => 'Dimas Saputra',
                'jenis_kelamin' => 'L',
                'kelas' => 'XI TKJ 2',
                'jurusan' => 'TKJ',
                'alamat' => 'Jl. Dahlia 4',
                'no_hp' => '081234567894',
                'tanggal_daftar' => '2023-07-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}