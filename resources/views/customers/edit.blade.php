@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Customer</h2>

    <form action="{{ route('customers.update', $customer) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
            <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone <span class="text-red-500">*</span></label>
            <input type="text" id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email', $customer->email) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded-md hover:bg-blue-700 transition">Update Customer</button>
        </div>
    </form>
</div>
@endsection