<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fareed Motors - Available Vehicles</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">

    <!-- Header -->
    <header class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-3xl font-extrabold text-blue-600">Fareed Motors</h1>
            <nav>
                <a href="/" class="text-gray-700 hover:text-blue-600 text-lg font-medium">Home</a>
                <a href="/vehicles" class="ml-6 text-gray-700 hover:text-blue-600 text-lg font-medium">All Vehicles</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-blue-50 py-12">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold text-blue-700 mb-4">Explore Our Top Quality Vehicles</h2>
            <p class="text-lg text-blue-600">Drive your dream car today with Fareed Motors</p>
        </div>
    </section>

    <!-- Vehicle Listings -->
    <main class="container mx-auto px-6 py-10">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Available Vehicles</h2>

        @if($availableVehicles->isEmpty())
            <p class="text-gray-600 text-lg">No vehicles available at the moment.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($availableVehicles as $vehicle)
                    <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition p-6">
                       @if($vehicle->image_path)
                            <img 
                                src="{{ asset('storage/' . $vehicle->image_path) }}" 
                                alt="{{ $vehicle->make }} {{ $vehicle->model }}" 
                                class="w-full h-56 object-cover object-center rounded mb-4"
                                style="max-height: 224px;" 
                            >
                        @else
                            <div class="w-full h-56 bg-gray-200 flex items-center justify-center rounded mb-4 text-gray-400">
                                No Image
                            </div>
                        @endif
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">
                            {{ $vehicle->make }} {{ $vehicle->model }}
                        </h3>
                        <ul class="text-gray-600 space-y-1">
                            <li><strong>Year:</strong> {{ $vehicle->year }}</li>
                            <li><strong>Type:</strong> {{ ucfirst($vehicle->vehicle_type) }}</li>
                            <li><strong>Mileage:</strong> {{ $vehicle->mileage ?? 'N/A' }} km</li>
                            <li>
                                <strong>Price:</strong> 
                                <span class="text-green-600 font-bold">Rs. {{ number_format($vehicle->price, 2) }}</span>
                            </li>
                        </ul>
                        <span class="inline-block mt-4 px-3 py-1 bg-green-100 text-green-800 text-sm rounded">
                            Available
                        </span>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12 py-6">
        <div class="text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Fareed Motors. All rights reserved.
        </div>
    </footer>

</body>
</html>