@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
    <h1 class="text-3xl font-bold text-gray-800 mb-6">📊 Dashboard</h1>

    {{-- Stats Cards --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white shadow rounded-xl p-5 border-l-4 border-blue-500">
            <div class="text-sm text-gray-500">Total Sales</div>
            <div class="text-3xl font-semibold text-blue-600 mt-1">{{ $totalSales }}</div>
        </div>
        <div class="bg-white shadow rounded-xl p-5 border-l-4 border-green-500">
            <div class="text-sm text-gray-500">Total Payments</div>
            <div class="text-3xl font-semibold text-green-600 mt-1">Rs. {{ number_format($totalPayments, 2) }}</div>
        </div>
    </div>

    {{-- Recent Sales & Payments --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        {{-- Recent Sales --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-xl font-bold text-gray-700 mb-4">🧾 Recent Sales</h2>
            <ul class="divide-y divide-gray-200">
                @forelse ($recentSales as $sale)
                    <li class="py-3">
                        <div class="font-semibold text-gray-800">{{ $sale->customer->name }}</div>
                        <div class="text-sm text-gray-500">
                            {{ $sale->sale_date }} — Rs. {{ number_format($sale->total_amount, 2) }}
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500 py-3">No sales found.</li>
                @endforelse
            </ul>
        </div>

        {{-- Recent Payments --}}
        <div class="bg-white shadow rounded-xl p-6">
            <h2 class="text-xl font-bold text-gray-700 mb-4">💰 Recent Payments</h2>
            <ul class="divide-y divide-gray-200">
                @forelse ($recentPayments as $payment)
                    <li class="py-3">
                        <div class="font-semibold text-gray-800">{{ $payment->sale->customer->name }}</div>
                        <div class="text-sm text-gray-500">
                            {{ $payment->payment_date }} — Rs. {{ number_format($payment->amount, 2) }} 
                            ({{ ucfirst($payment->payment_method) }})
                        </div>
                    </li>
                @empty
                    <li class="text-gray-500 py-3">No payments found.</li>
                @endforelse
            </ul>
        </div>
    </div>
</div>
@endsection