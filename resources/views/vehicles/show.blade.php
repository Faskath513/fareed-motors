@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6 px-4">
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Vehicle Details</h1>
        <a href="{{ route('vehicles.index') }}" 
           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100 transition">
            <!-- Left arrow icon -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to List
        </a>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        @if($vehicle->image_path)
            <img 
                src="{{ asset('storage/' . $vehicle->image_path) }}" 
                alt="{{ $vehicle->make }} {{ $vehicle->model }}" 
                class="w-full max-h-56 object-cover rounded mb-6"
            >
        @else
            <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded mb-6 text-gray-400">
                No Image
            </div>
        @endif

        <ul class="space-y-3 text-gray-800 text-lg">
            <li><span class="font-semibold">Make:</span> {{ $vehicle->make }}</li>
            <li><span class="font-semibold">Model:</span> {{ $vehicle->model }}</li>
            <li><span class="font-semibold">Year:</span> {{ $vehicle->year }}</li>
            <li><span class="font-semibold">Type:</span> {{ ucfirst($vehicle->vehicle_type) }}</li>
            <li><span class="font-semibold">Price:</span> Rs. {{ number_format($vehicle->price, 2) }}</li>
            <li><span class="font-semibold">Mileage:</span> {{ $vehicle->mileage ?? 'N/A' }} km</li>
            <li><span class="font-semibold">Condition:</span> {{ ucfirst($vehicle->condition) }}</li>
            <li><span class="font-semibold">Status:</span> {{ ucfirst($vehicle->status) }}</li>
        </ul>

        <div class="mt-8 flex space-x-4">
            <a href="{{ route('vehicles.edit', $vehicle) }}" 
               class="px-6 py-2 bg-yellow-500 text-white rounded-lg shadow hover:bg-yellow-600 transition">
               Edit
            </a>
            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vehicle?')" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" 
                        class="px-6 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection