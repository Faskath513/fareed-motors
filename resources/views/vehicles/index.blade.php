@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-6 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-extrabold text-gray-900">Vehicles</h1>
        <a href="{{ route('vehicles.create') }}" 
           class="inline-block px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
           + Add Vehicle
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-6 border border-green-300">
            {{ session('success') }}
        </div>
    @endif

    @if ($vehicles->count())
        <div class="overflow-x-auto rounded-lg border border-gray-200 shadow-sm">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Make
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Model
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Year
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Actions</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($vehicles as $vehicle)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($vehicle->image_path)
                                <img 
                                    src="{{ asset('storage/' . $vehicle->image_path) }}" 
                                    alt="{{ $vehicle->make }} {{ $vehicle->model }}" 
                                    class="w-32 h-20 rounded object-cover"
                                    style="max-height: 80px;"
                                >
                            @else
                                <div class="w-32 h-20 bg-gray-200 flex items-center justify-center rounded text-gray-400 text-sm">
                                    No Image
                                </div>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 font-semibold">
                            {{ $vehicle->make }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                            {{ $vehicle->model }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900">
                            {{ $vehicle->year }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-gray-900 capitalize">
                            {{ $vehicle->vehicle_type }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-3 py-1 rounded-full text-sm font-semibold 
                                {{ 
                                  $vehicle->status === 'available' ? 'bg-green-100 text-green-800' : 
                                  ($vehicle->status === 'sold' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')
                                }}">
                                {{ ucfirst($vehicle->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                            <a href="{{ route('vehicles.show', $vehicle) }}" 
                               class="text-blue-600 hover:text-blue-900">View</a>
                            <a href="{{ route('vehicles.edit', $vehicle) }}" 
                               class="text-yellow-600 hover:text-yellow-900">Edit</a>
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $vehicles->links() }}
        </div>
    @else
        <p class="text-gray-600 text-center">No vehicles found.</p>
    @endif
</div>
@endsection