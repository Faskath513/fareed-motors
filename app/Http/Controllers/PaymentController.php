<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Sale;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Show all payments and available sales for the payment form.
     */
    public function index()
    {
        // Get all payments with their related sale, customer, and vehicle
        $payments = Payment::with(['sale.customer', 'sale.vehicle'])->latest()->get();

        // Option A: Get all sales
        $sales = Sale::with('customer', 'vehicle')->get(); 

        // Option B (optional): Only show sales with outstanding balance
        // $sales = Sale::with(['customer', 'vehicle', 'payments'])->get()->filter(fn($sale) => !$sale->is_fully_paid);

        return view('payments.index', compact('payments', 'sales'));
    }

    /**
     * Store a new payment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sale_id'        => 'required|exists:sales,id',
            'payment_date'   => 'required|date',
            'amount'         => 'required|numeric|min:0.01',
            'payment_method' => 'required|string|max:50',
            'notes'          => 'nullable|string|max:255',
        ]);

        Payment::create($validated);

        return back()->with('success', 'Payment added successfully.');
    }
}