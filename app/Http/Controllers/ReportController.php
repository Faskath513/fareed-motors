<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Payment;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->input('start_date');
        $end = $request->input('end_date');

        $sales = Sale::with('customer')->when($start && $end, function ($query) use ($start, $end) {
            $query->whereBetween('sale_date', [$start, $end]);
        })->get();

        $payments = Payment::when($start && $end, function ($query) use ($start, $end) {
            $query->whereBetween('payment_date', [$start, $end]);
        })->get();

        return view('reports.index', compact('sales', 'payments', 'start', 'end'));
    }
}