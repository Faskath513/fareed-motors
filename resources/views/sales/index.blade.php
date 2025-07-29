@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Sales</h1>
        <a href="{{ route('sales.create') }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Add New Sale</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if($sales->count())
        <table class="min-w-full border border-gray-300 rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2 border">#</th>
                    <th class="px-4 py-2 border">Vehicle</th>
                    <th class="px-4 py-2 border">Customer</th>
                    <th class="px-4 py-2 border">Sale Date</th>
                    <th class="px-4 py-2 border">Total Amount</th>
                    <th class="px-4 py-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($sales as $sale)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">
                            {{ $sale->vehicle->make ?? '' }} {{ $sale->vehicle->model ?? '' }} ({{ $sale->vehicle->plate_number ?? '' }})
                        </td>
                        <td class="px-4 py-2 border">{{ $sale->customer->name ?? '' }}</td>
                        <td class="px-4 py-2 border">{{ $sale->sale_date->format('Y-m-d') }}</td>
                        <td class="px-4 py-2 border">${{ number_format($sale->total_amount, 2) }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('sales.show', $sale) }}" class="text-blue-600 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $sales->links() }} {{-- pagination links --}}
        </div>
    @else
        <p>No sales found.</p>
    @endif
</div>
@endsection