<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function index()
    {
        $purchases = Purchase::all();
        return view('purchases.index', compact('purchases'));
    }

    public function create()
    {
        return view('purchases.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'ticket_quantity' => 'required|numeric|min:1',
            'total_amount' => 'required|numeric|min:0',
            'payment_id' => 'required',
            'status' => 'required',
        ]);

        $purchase = Purchase::create($request->all());

        return redirect()->route('purchases.index');
    }

    public function edit($id)
    {
        $purchase = Purchase::findOrFail($id);
        return view('purchases.edit', compact('purchase'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'event_id' => 'required',
            'ticket_quantity' => 'required|numeric|min:1',
            'total_amount' => 'required|numeric|min:0',
            'payment_id' => 'required',
            'status' => 'required',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());

        return redirect()->route('purchases.index');
    }

    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('purchases.index');
    }
}
