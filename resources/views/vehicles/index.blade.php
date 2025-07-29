@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Vehicles</h1>
        <a href="{{ route('vehicles.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Add Vehicle</a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($vehicles->count())
        <table class="min-w-full bg-white border rounded">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">Make</th>
                    <th class="px-4 py-2">Model</th>
                    <th class="px-4 py-2">Year</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $vehicle->make }}</td>
                        <td class="px-4 py-2">{{ $vehicle->model }}</td>
                        <td class="px-4 py-2">{{ $vehicle->year }}</td>
                        <td class="px-4 py-2">{{ $vehicle->vehicle_type }}</td>
                        <td class="px-4 py-2 capitalize">{{ $vehicle->status }}</td>
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('vehicles.show', $vehicle) }}" class="text-blue-600 hover:underline">View</a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="text-yellow-600 hover:underline">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $vehicles->links() }}
        </div>
    @else
        <p class="text-gray-600">No vehicles found.</p>
    @endif
</div>
@endsection