<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fareed Motors POS</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="flex min-h-screen">
    <aside class="w-64 bg-white shadow">
        <a href="{{ url('/') }}">
            <div class="p-6 text-xl font-bold border-b">Fareed Motors POS</div>
        </a>
    
        {{-- Navigation Links --}}
        <nav class="p-4 space-y-2">
            <a href="{{ route('dashboard.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
            <a href="{{ route('vehicles.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Vehicles</a>
            <a href="{{ route('customers.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Customers</a>
            <a href="{{ route('sales.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Sales</a>
            <a href="{{ route('payments.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Payments</a>
            <a href="{{ route('reports.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Reports</a>
        </nav>
    </aside>

    <main class="flex-1 p-6">
        @yield('content')
    </main>
</div>
@include('partials.footer') {{-- Optional footer --}}
</body>
</html>