<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = [
        'nama_barang',
        'tanggal_masuk',
        'lokasi',
        'harga',
        'stok',
        // Tambahkan atribut lain yang dapat diisi
    ];
    //
}
