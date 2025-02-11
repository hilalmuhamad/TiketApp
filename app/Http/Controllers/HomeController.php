<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class HomeController extends Controller
{
    public function index()
    {
        // Remove any auth checks
        return view('index');
    }

    public function login()
    {
        return view('login');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function ticket()
    {
        $tribuns = \App\Models\PilihTribun::all();
        return view('ticket', compact('tribuns'));
    }

    public function ticketList()
    {
        $tickets = Payment::where('user_id', Auth::id())
            ->with('tribun')
            ->latest()
            ->get();
        return view('ticket-list', compact('tickets'));
    }

    public function signup()
    {
        return view('signup');
    }
}