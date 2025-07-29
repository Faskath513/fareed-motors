@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-xl font-bold mb-4">Customers</h2>
    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-3">Add Customer</a>

    <table class="table-auto w-full border">
        <thead>
            <tr>
                <th class="px-4 py-2 border">#</th>
                <th class="px-4 py-2 border">Name</th>
                <th class="px-4 py-2 border">Phone</th>
                <th class="px-4 py-2 border">Email</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
            <tr>
                <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 border">{{ $customer->name }}</td>
                <td class="px-4 py-2 border">{{ $customer->phone }}</td>
                <td class="px-4 py-2 border">{{ $customer->email }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ route('customers.edit', $customer) }}" class="text-blue-500">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection