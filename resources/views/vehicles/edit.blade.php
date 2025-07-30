@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-semibold">Edit Vehicle</h1>
        <a href="{{ route('vehicles.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-gray-700 hover:bg-gray-100">
            <!-- You can replace this SVG with your own icon or remove it -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
            Back to list
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Please fix these errors:</strong>
            <ul class="list-disc list-inside mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <form action="{{ route('vehicles.update', $vehicle) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Make -->
                <div>
                    <label for="make" class="block text-sm font-medium text-gray-700 mb-1">Make</label>
                    <input type="text" name="make" id="make" value="{{ old('make', $vehicle->make) }}" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Model -->
                <div>
                    <label for="model" class="block text-sm font-medium text-gray-700 mb-1">Model</label>
                    <input type="text" name="model" id="model" value="{{ old('model', $vehicle->model) }}" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Year -->
                <div>
                    <label for="year" class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                    <input type="number" name="year" id="year" value="{{ old('year', $vehicle->year) }}" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Vehicle Type -->
                <div>
                    <label for="vehicle_type" class="block text-sm font-medium text-gray-700 mb-1">Vehicle Type</label>
                    <input type="text" name="vehicle_type" id="vehicle_type" value="{{ old('vehicle_type', $vehicle->vehicle_type) }}" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>

                <!-- Price -->
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
                    <div class="relative rounded-md shadow-sm">
                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</div>
                        <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $vehicle->price) }}" 
                            class="block w-full rounded-md border border-gray-300 pl-7 pr-3 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                    </div>
                </div>

                <!-- Mileage -->
                <div>
                    <label for="mileage" class="block text-sm font-medium text-gray-700 mb-1">Mileage</label>
                    <div class="relative rounded-md shadow-sm">
                        <input type="number" name="mileage" id="mileage" value="{{ old('mileage', $vehicle->mileage) }}" 
                            class="block w-full rounded-md border border-gray-300 pr-10 py-2 focus:border-indigo-500 focus:ring-indigo-500">
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500">mi</div>
                    </div>
                </div>

                <!-- Condition -->
                <div>
                    <label for="condition" class="block text-sm font-medium text-gray-700 mb-1">Condition</label>
                    <select id="condition" name="condition" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="used" {{ old('condition', $vehicle->condition) == 'used' ? 'selected' : '' }}>Used</option>
                        <option value="brandnew" {{ old('condition', $vehicle->condition) == 'brandnew' ? 'selected' : '' }}>Brand New</option>
                    </select>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" 
                        class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="available" {{ old('status', $vehicle->status) == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="sold" {{ old('status', $vehicle->status) == 'sold' ? 'selected' : '' }}>Sold</option>
                        <option value="reserved" {{ old('status', $vehicle->status) == 'reserved' ? 'selected' : '' }}>Reserved</option>
                    </select>
                </div>
            </div>

            <div class="pt-6">
                <button type="submit" 
                    class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-6 text-white text-lg font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                    Update Vehicle
                </button>
            </div>
        </form>
    </div>
</div>
@endsection