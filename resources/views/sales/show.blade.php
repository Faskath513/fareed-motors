@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6 bg-white rounded-lg shadow-md">

    <!-- Page Title -->
    <h2 class="text-3xl font-bold mb-8 border-b pb-4">🧾 Sale Summary</h2>

    <!-- Sale Overview -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Customer</p>
            <p class="font-semibold text-lg">{{ $sale->customer->name }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Vehicle</p>
            <p class="font-semibold text-lg">{{ $sale->vehicle->make }} {{ $sale->vehicle->model }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Sale Date</p>
            <p class="font-semibold text-lg">{{ $sale->sale_date instanceof \Carbon\Carbon ? $sale->sale_date->format('Y-m-d') : $sale->sale_date }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Total Amount</p>
            <p class="font-semibold text-lg text-green-600">${{ number_format($sale->total_amount, 2) }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Paid</p>
            <p class="font-semibold text-lg text-blue-600">${{ number_format($sale->payments->sum('amount'), 2) }}</p>
        </div>
        <div class="bg-gray-50 p-4 rounded shadow">
            <p class="text-sm text-gray-500">Balance</p>
            <p class="font-semibold text-lg text-red-600">${{ number_format($sale->balance_amount, 2) }}</p>
        </div>
    </div>

    <!-- Payment Section -->
    <h3 class="text-2xl font-semibold mb-4">💳 Payments</h3>

    @if($sale->payments->count())
        <ul class="space-y-4">
            @foreach ($sale->payments as $payment)
                <li class="flex justify-between items-center p-4 bg-white border rounded shadow-sm hover:bg-gray-50 transition">
                    <div>
                        <p class="font-medium text-gray-800">{{ $payment->payment_date instanceof \Carbon\Carbon ? $payment->payment_date->format('Y-m-d') : $payment->payment_date }}</p>
                        <p class="text-sm text-gray-500">{{ ucfirst($payment->payment_method) }}</p>
                    </div>
                    <span class="text-right text-green-600 font-semibold text-lg">
                        ${{ number_format($payment->amount, 2) }}
                    </span>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-gray-500 italic">No payments recorded yet.</p>
    @endif

</div>
@endsection