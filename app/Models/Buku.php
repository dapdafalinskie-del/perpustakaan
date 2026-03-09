<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    public $incrementing = true;
    public $timestamp = true;
    protected $fillable = [
        'kode_buku',
        'judul_buku',
        'pengarang',
        'penerbit',
        'tahun',
        'kategori',
        'rak',
        'stok'
    ];
    protected $casts = [
        'created_at'     => 'datetime',
        'updated_at'     => 'datetime',
    ];

    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id_buku', 'id');
    }
}
