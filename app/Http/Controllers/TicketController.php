<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;

class TicketController extends Controller
{
    public function index()
    {
        return view('ticket', compact('bookings'));
    }

    // Method untuk menampilkan detail tiket
    public function show($ticketCode)
    {
        $userId = Auth::id();

        // Ambil detail tiket berdasarkan kode tiket dan user yang sedang login
        $ticket = DB::table('tickets')
            ->join('events', 'tickets.event_id', '=', 'events.id')
            ->join('bookings', 'tickets.booking_id', '=', 'bookings.id')
            ->where('tickets.ticket_code', $ticketCode)
            ->where('bookings.user_id', $userId)
            ->select(
                'tickets.ticket_code',
                'bookings.status',
                'events.nama_acara',
                'events.tanggal_waktu',
                'events.lokasi',
                'events.deskripsi',
                'events.harga_tiket',
                'bookings.total_tickets',
                DB::raw('COALESCE(events.gambar_acara, "https://via.placeholder.com/800x400") as gambar_acara')
            )
            ->first();

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }

        return view('myticket', compact('ticket'));
    }

 // Method untuk membatalkan tiket
    public function cancel($ticketCode)
    {
        $userId = Auth::id();

        // Ambil tiket yang akan dibatalkan
        $ticket = DB::table('tickets')
            ->join('bookings', 'tickets.booking_id', '=', 'bookings.id')
            ->where('tickets.ticket_code', $ticketCode)
            ->where('bookings.user_id', $userId)
            ->where('tickets.status', 'active') // Hanya tiket yang aktif yang bisa dibatalkan
            ->select('tickets.id', 'tickets.status', 'tickets.event_id', 'bookings.total_tickets')
            ->first();

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not eligible for cancellation.');
        }

        // Update status tiket menjadi "canceled"
        DB::table('tickets')
            ->where('id', $ticket->id)
            ->update(['status' => 'canceled']);

        // Tambahkan kembali kuota tiket di tabel events
        DB::table('events')
            ->where('id', $ticket->event_id)
            ->increment('kouta_tiket', 1);

        return redirect()->route('tickets.index')->with('success', 'Ticket has been successfully canceled.');
    }

    // buat method untuk hapus ticket
    public function destroy($ticketCode)
    {
        // Cari tiket berdasarkan kode tiket
        $ticket = Ticket::where('ticket_code', $ticketCode)->first();

        // Jika tiket tidak ditemukan, kembalikan dengan pesan error
        if (!$ticket) {
            return redirect()->route('tickets.index')->with('error', 'Ticket not found.');
        }

        // Hapus tiket
        $ticket->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->route('tickets.index')->with('success', 'Ticket successfully deleted.');
    }

    public function downloadTicket($paymentId)
    {
        $payment = Payment::with(['user', 'tribun'])->findOrFail($paymentId);
        
        $ticketNumber = 'TICKET-' . str_pad($payment->id, 6, '0', STR_PAD_LEFT);
        
        $data = [
            'home_team' => 'PERSIB',
            'away_team' => 'PERSIJA',
            'location' => 'Stadion Gelora Bandung Lautan Api',
            'date' => '20 November 2024',
            'time' => '19:00 WIB',
            'tribune' => $payment->tribun->nama_tribun,
            'price' => $payment->tribun->harga,
            'seat_number' => 'A-' . $payment->id,
            'ticket_number' => $ticketNumber // Make sure this is passed to the view
        ];

        $pdf = PDF::loadView('pdf.match_result', $data);
        return $pdf->download($ticketNumber . '.pdf');
    }
}
