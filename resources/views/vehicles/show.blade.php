@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Vehicle Details</h1>

    <div class="bg-white p-6 rounded shadow">
        <ul class="space-y-2">
            <li><strong>Make:</strong> {{ $vehicle->make }}</li>
            <li><strong>Model:</strong> {{ $vehicle->model }}</li>
            <li><strong>Year:</strong> {{ $vehicle->year }}</li>
            <li><strong>Type:</strong> {{ $vehicle->vehicle_type }}</li>
            <li><strong>Price:</strong> ${{ number_format($vehicle->price, 2) }}</li>
            <li><strong>Mileage:</strong> {{ $vehicle->mileage }} km</li>
            <li><strong>Condition:</strong> {{ ucfirst($vehicle->condition) }}</li>
            <li><strong>Status:</strong> {{ ucfirst($vehicle->status) }}</li>
        </ul>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('vehicles.edit', $vehicle) }}" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>
            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection