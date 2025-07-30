<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalSales' => Sale::count(),
            'totalPayments' => Payment::sum('amount'),
            'recentSales' => Sale::with('customer')->latest()->take(5)->get(),
            'recentPayments' => Payment::with('sale.customer')->latest()->take(5)->get(),
        ]);
    }
}