@extends('layouts.app')

@section('content')
<h2 class="text-xl font-semibold mb-4">Reports</h2>

<form method="GET" class="mb-4">
    <input type="date" name="start_date" value="{{ request('start_date') }}">
    <input type="date" name="end_date" value="{{ request('end_date') }}">
    <button class="bg-blue-500 text-white px-3 py-1 rounded">Filter</button>
</form>

<h3 class="font-semibold mt-6">Sales</h3>
<ul>
    @foreach ($sales as $sale)
        <li>{{ $sale->sale_date }} - {{ $sale->customer->name }} - {{ $sale->total_amount }}</li>
    @endforeach
</ul>

<h3 class="font-semibold mt-6">Payments</h3>
<ul>
    @foreach ($payments as $payment)
        <li>{{ $payment->payment_date }} - {{ $payment->amount }} ({{ $payment->payment_method }})</li>
    @endforeach
</ul>
@endsection