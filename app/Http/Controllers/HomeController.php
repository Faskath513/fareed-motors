<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;

class HomeController extends Controller
{
    public function index()
    {
        // Fetch all vehicles where status is 'available'
        $availableVehicles = Vehicle::where('status', 'available')->get();

        return view('welcome', compact('availableVehicles'));
    }
}