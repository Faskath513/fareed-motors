@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold text-gray-700 mb-2">Vehicles</h2>
        <p class="text-gray-600 mb-4">Manage your vehicle inventory.</p>
        <a href="{{ route('vehicles.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
    </div>

    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold text-gray-700 mb-2">Customers</h2>
        <p class="text-gray-600 mb-4">Manage customer details.</p>
        <a href="{{ route('customers.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
    </div>

    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold text-gray-700 mb-2">Sales</h2>
        <p class="text-gray-600 mb-4">Record and track sales.</p>
        <a href="{{ route('sales.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
    </div>

    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold text-gray-700 mb-2">Payments</h2>
        <p class="text-gray-600 mb-4">Monitor customer payments.</p>
        <a href="{{ route('payments.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
    </div>

    <div class="bg-white p-6 rounded shadow text-center">
        <h2 class="text-xl font-bold text-gray-700 mb-2">Reports</h2>
        <p class="text-gray-600 mb-4">Generate and view reports.</p>
        <a href="{{ route('reports.index') }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">View</a>
    </div>
</div>
@endsection