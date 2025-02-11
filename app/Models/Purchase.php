<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi
    protected $fillable = [
        'user_id',
        'event_id',
        'ticket_quantity',
        'total_amount',
        'status',
        'payment_id', // Relasi ke tabel payments
    ];

    // Relasi ke Payment
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    // Relasi ke Event
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
