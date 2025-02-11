<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'name',
        'address'
    ];

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
