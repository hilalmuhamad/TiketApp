<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PilihTribun extends Model
{
    use HasFactory;

    protected $table = 'pilih_tribuns'; // Nama tabel di database
    
    // Properti fillable hanya perlu satu kali
    protected $fillable = [
        'nama_tribun',
        'tempat_penukaran',
        'harga',
        'stok'
    ];

    public function decreaseStock($quantity)
    {
        if ($this->stok >= $quantity) {
            $this->decrement('stok', $quantity);
            return true;
        }
        return false;
    }
}
