<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PilihTribun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function showPaymentForm(Request $request, PilihTribun $tribun)
    {
        return view('payment', compact('tribun'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'payment_method' => 'required|string',
            'tribun_id' => 'required|exists:pilih_tribuns,id',
            'quantity' => 'required|integer|min:1',
            'email' => 'required|email',
            'phone' => 'required|string'
        ]);

        $tribun = PilihTribun::findOrFail($request->tribun_id);
        $amount = $tribun->harga * $request->quantity;

        try {
            $payment = Payment::create([
                'user_id' => Auth::id(),
                'tribun_id' => $validated['tribun_id'],
                'payment_method' => $validated['payment_method'],
                'quantity' => $validated['quantity'],
                'amount' => $amount,
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'status' => 'pending'
            ]);

            return redirect()->route('payment.pending', $payment->id);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Payment processing failed. Please try again.']);
        }
    }

    public function showPending(Payment $payment)
    {
        if ($payment->user_id !== Auth::id()) {
            abort(403);
        }
        return view('payment-pending', compact('payment'));
    }

    public function confirmPayment(Payment $payment)
    {
        $payment->update(['status' => 'paid']);
        return redirect()->route('payment.success', $payment->id);
    }

    public function showSuccess(Payment $payment)
    {
        $tribun = $payment->tribun;
        return view('success', compact('payment', 'tribun'));
    }
}