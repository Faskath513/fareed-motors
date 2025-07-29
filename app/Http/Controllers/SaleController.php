<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with(['customer', 'vehicle'])->latest()->paginate(10);  // paginate instead of get()
    return view('sales.index', compact('sales'));
    }

    public function create()
    {
        $customers = Customer::all();
        $vehicles = Vehicle::all();
        return view('sales.create', compact('customers', 'vehicles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'vehicle_id' => 'required|exists:vehicles,id',
            'customer_id' => 'required|exists:customers,id',
            'sale_date' => 'required|date',
            'total_amount' => 'required|numeric',
            'notes' => 'nullable|string',
        ]);

        Sale::create($validated);
        return redirect()->route('sales.index')->with('success', 'Sale recorded.');
    }

    public function show(Sale $sale)
    {
        $sale->load(['customer', 'vehicle', 'payments']);
        return view('sales.show', compact('sale'));
    }
}