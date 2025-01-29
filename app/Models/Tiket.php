<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    protected $fillable = [
        'nama_event',
        'tanggal_event',
        'lokasi',
        'harga',
        'stok',
        // Tambahkan atribut lain yang dapat diisi
    ];
    //
}
