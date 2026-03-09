<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $incrementing = true;
    public $timestamps = true;
    protected $fillable = [
        'id_transaksi',
        'tanggal_pinjam',
        'tanggal_kembali',
        'id_anggota',
        'id_buku',
        'denda',
        'status'
    ];

    public function anggota(){
        return $this->belongsTo(Anggota::class, 'id_anggota', 'id');
    }

    public function buku(){
        return $this->belongsTo(Buku::class, 'id_buku', 'id');
    }
}
