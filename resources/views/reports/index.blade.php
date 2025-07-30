@extends('layouts.app')

@section('title', 'Reports')

@section('content')
<div class="bg-white shadow rounded p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Reports</h2>

    {{-- Filter Form --}}
    <form method="GET" class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div>
            <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
            <input type="date" name="start_date" id="start_date"
                   value="{{ request('start_date') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div>
            <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
            <input type="date" name="end_date" id="end_date"
                   value="{{ request('end_date') }}"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex items-end">
            <button type="submit"
                    class="w-full bg-blue-600 text-white font-medium py-2 px-4 rounded hover:bg-blue-700">
                Filter
            </button>
        </div>
    </form>

    {{-- Sales Section --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">Sales</h3>
        @if ($sales->count())
            <ul class="divide-y divide-gray-200">
                @foreach ($sales as $sale)
                    <li class="py-2 flex justify-between text-sm text-gray-700">
                        <span>{{ \Carbon\Carbon::parse($sale->sale_date)->format('M d, Y') }}</span>
                        <span>{{ $sale->customer->name }}</span>
                        <span class="font-medium text-green-600">Rs. {{ number_format($sale->total_amount, 2) }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 text-sm">No sales found for selected date range.</p>
        @endif
    </div>

    {{-- Payments Section --}}
    <div>
        <h3 class="text-xl font-semibold text-gray-700 border-b pb-2 mb-4">Payments</h3>
        @if ($payments->count())
            <ul class="divide-y divide-gray-200">
                @foreach ($payments as $payment)
                    <li class="py-2 flex justify-between text-sm text-gray-700">
                        <span>{{ \Carbon\Carbon::parse($payment->payment_date)->format('M d, Y') }}</span>
                        <span>{{ $payment->payment_method }}</span>
                        <span class="font-medium text-blue-600">Rs. {{ number_format($payment->amount, 2) }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="text-gray-500 text-sm">No payments found for selected date range.</p>
        @endif
    </div>
</div>
@endsection