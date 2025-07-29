@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Add New Sale</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('sales.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label for="vehicle_id" class="block font-medium">Vehicle</label>
            <select name="vehicle_id" id="vehicle_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Vehicle --</option>
                @foreach ($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ old('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->make ?? '' }} {{ $vehicle->model ?? '' }} ({{ $vehicle->plate_number ?? '' }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="customer_id" class="block font-medium">Customer</label>
            <select name="customer_id" id="customer_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Customer --</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id }}" {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                        {{ $customer->name }} ({{ $customer->phone }})
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="sale_date" class="block font-medium">Sale Date</label>
            <input type="date" name="sale_date" value="{{ old('sale_date', date('Y-m-d')) }}" required>
        </div>

        <div>
            <label for="total_amount" class="block font-medium">Total Amount</label>
            <input type="number" step="0.01" min="0" name="total_amount" id="total_amount"
                   class="w-full border border-gray-300 rounded px-3 py-2"
                   value="{{ old('total_amount') }}" required>
        </div>

        <div>
            <label for="notes" class="block font-medium">Notes</label>
            <textarea name="notes" id="notes" rows="4"
                      class="w-full border border-gray-300 rounded px-3 py-2">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save Sale</button>
    </form>
</div>
@endsection