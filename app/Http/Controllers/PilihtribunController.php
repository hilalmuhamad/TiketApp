<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PilihTribun;

class PilihTribunController extends Controller
{
    public function pilihtribun()
    {
        $pilih_tribuns = PilihTribun::all();
        return view('pilihtribun', compact('pilih_tribuns'));
    }

    public function showForm(PilihTribun $tribun)
    {
        return view('form', compact('tribun'));
    }
}