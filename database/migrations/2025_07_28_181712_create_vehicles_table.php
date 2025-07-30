<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('make');          // e.g. Toyota, Honda
            $table->string('model');         // e.g. Corolla, Civic
            $table->year('year');            // e.g. 2015, 2018
            $table->string('vehicle_type'); // car, bike, van, etc.
            $table->decimal('price', 12, 2);
            $table->integer('mileage')->default(0);
            $table->enum('condition', ['used', 'brandnew'])->default('brandnew');
            $table->enum('status', ['available', 'sold', 'reserved'])->default('available');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};