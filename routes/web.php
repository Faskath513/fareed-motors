<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
});


// Vehicle Routes
Route::resource('vehicles', VehicleController::class);

// Customer Routes
Route::resource('customers', CustomerController::class);

// Sale Routes
Route::resource('sales', SaleController::class);

// Payment Routes
Route::resource('payments', PaymentController::class);

// Report Routes
Route::get('reports', [ReportController::class, 'index'])->name('reports.index');