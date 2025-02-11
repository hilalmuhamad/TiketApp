<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'logins'; // Nama tabel

    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
    ];
}
