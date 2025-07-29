<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
{
    $vehicles = Vehicle::latest()->paginate(10);
    return view('vehicles.index', compact('vehicles')); // ✅ Fix here
}

    public function create()
    {
        return view('vehicles.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'vehicle_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'mileage' => 'nullable|integer|min:0',
            'condition' => 'required|string|max:255',
            'status' => 'required|in:available,sold,reserved',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully.');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        return view('vehicles.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'vehicle_type' => 'required|string|max:100',
            'price' => 'required|numeric|min:0',
            'mileage' => 'nullable|integer|min:0',
            'condition' => 'required|string|max:255',
            'status' => 'required|in:available,sold,reserved',
        ]);

        $vehicle->update($validated);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully.');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
    }
}