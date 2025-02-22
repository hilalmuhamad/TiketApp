<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DetailEventController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FavoritEventController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoritMyEventController;
use App\Models\Favorit;
use App\Http\Controllers\PilihTribunController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PDFController;

// Public routes (no auth required)
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/index', [HomeController::class, 'index'])->name('index'); // Remove auth middleware
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');

// Guest routes
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Auth required routes
Route::middleware(['auth'])->group(function () {
    // Basic pages
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/index', [HomeController::class, 'index'])->name('index');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

    // Tickets and Events
    Route::get('/ticket', [HomeController::class, 'ticket'])->name('ticket');
    Route::get('/my-tickets', [HomeController::class, 'ticketList'])->name('tickets.list');
    Route::get('/events', [EventController::class, 'showEvents'])->name('events.index');
    
    // Tribune Selection
    Route::get('/pilihtribun', [PilihTribunController::class, 'pilihtribun'])->name('pilihtribun');
    Route::get('/form/{tribun}', [PilihTribunController::class, 'showForm'])->name('form.show');

    // Payment Flow
    Route::get('/payment/form/{tribun}', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment/pending/{payment}', [PaymentController::class, 'showPending'])->name('payment.pending');
    Route::get('/payment/success/{payment}', [PaymentController::class, 'showSuccess'])->name('payment.success');

    Route::get('/ticket/download/{payment}', [TicketController::class, 'downloadTicket'])->name('ticket.download');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/payment/{payment}/confirm', [PaymentController::class, 'confirmPayment'])->name('payment.confirm');
});

Route::resource('purchases', PurchaseController::class);
Route::get('/download-pdf', [PDFController::class, 'download'])->name('download.pdf');

require __DIR__.'/auth.php';
