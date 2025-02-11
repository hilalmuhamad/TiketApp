<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tribun_id',
        'payment_method',
        'quantity',
        'amount',
        'email',
        'phone',
        'status',
        'payment_details'
    ];

    protected $attributes = [
        'quantity' => 1,
        'amount' => 0,
        'status' => 'pending',
        'phone' => 'default_phone_number'
    ];

    protected $table = 'payments';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tribun()
    {
        return $this->belongsTo(PilihTribun::class, 'tribun_id');
    }
}
