@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-6">
    <h1 class="text-2xl font-bold mb-4">Add New Vehicle</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vehicles.store') }}" method="POST" class="space-y-4">
        @csrf

        @foreach (['make', 'model', 'year', 'vehicle_type', 'price', 'mileage', 'condition'] as $field)
            <div>
                <label class="block font-medium capitalize" for="{{ $field }}">{{ str_replace('_', ' ', $field) }}</label>
                <input type="{{ in_array($field, ['year', 'price', 'mileage']) ? 'number' : 'text' }}"
                       name="{{ $field }}"
                       id="{{ $field }}"
                       value="{{ old($field) }}"
                       class="w-full border border-gray-300 rounded px-3 py-2"
                       required>
            </div>
        @endforeach

        <div>
            <label class="block font-medium" for="status">Status</label>
            <select name="status" id="status" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Select Status --</option>
                @foreach (['available', 'sold', 'reserved'] as $status)
                    <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save Vehicle</button>
    </form>
</div>
@endsection