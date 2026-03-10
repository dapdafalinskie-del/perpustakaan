<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable = [
        'id_anggota',
        'nama',
        'jenis_kelamin',
        'kelas',
        'jurusan',
        'alamat',
        'no_hp',
        'tanggal_daftar'
    ];
    protected $casts = [
        'tanggal_daftar' => 'datetime',
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_anggota', 'id');
    }

}
