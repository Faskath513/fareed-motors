@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6">Payments</h2>

    <!-- Add Payment Form -->
    <form method="POST" action="{{ route('payments.store') }}" class="bg-white shadow-md rounded-lg p-6 mb-8 space-y-4 border border-gray-200">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sale</label>
                <select name="sale_id" required class="w-full border-gray-300 rounded-md shadow-sm">
                    @foreach ($payments->pluck('sale')->unique() as $sale)
                        <option value="{{ $sale->id }}">
                            {{ $sale->customer->name }} - {{ $sale->vehicle->model }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Date</label>
                <input type="date" name="payment_date" required class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                <input type="number" step="0.01" name="amount" placeholder="0.00" required class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Payment Method</label>
                <input type="text" name="payment_method" placeholder="e.g., Cash" class="w-full border-gray-300 rounded-md shadow-sm">
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                <textarea name="notes" rows="2" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Optional notes..."></textarea>
            </div>
        </div>

        <div class="pt-4">
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold px-6 py-2 rounded-md transition">
                Add Payment
            </button>
        </div>
    </form>

    <!-- Payments Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-300 bg-white rounded shadow-sm">
            <thead class="bg-gray-100 text-sm font-semibold text-gray-700">
                <tr>
                    <th class="px-4 py-3 border-b">Sale</th>
                    <th class="px-4 py-3 border-b">Date</th>
                    <th class="px-4 py-3 border-b">Amount</th>
                    <th class="px-4 py-3 border-b">Method</th>
                </tr>
            </thead>
            <tbody class="text-sm text-gray-800">
                @forelse ($payments as $payment)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-2 border-b">{{ $payment->sale->customer->name }} - {{ $payment->sale->vehicle->model }}</td>
                        <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border-b">${{ number_format($payment->amount, 2) }}</td>
                        <td class="px-4 py-2 border-b">{{ ucfirst($payment->payment_method) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">No payments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection