@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Customer List</h2>
        <a href="{{ route('customers.create') }}" class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            + Add Customer
        </a>
    </div>

    <div class="bg-white shadow-md rounded-lg overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Phone</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-6 py-3 text-left font-medium text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                @forelse ($customers as $customer)
                <tr class="hover:bg-gray-50 transition">
                    <td class="px-6 py-4">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4">{{ $customer->name }}</td>
                    <td class="px-6 py-4">{{ $customer->phone }}</td>
                    <td class="px-6 py-4">{{ $customer->email }}</td>
                    <td class="px-6 py-4">
                        <a href="{{ route('customers.edit', $customer) }}" class="text-blue-600 hover:underline">Edit</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center px-6 py-4 text-gray-500">No customers found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection