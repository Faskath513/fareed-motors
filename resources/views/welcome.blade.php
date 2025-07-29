<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Fareed Motors POS</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center px-4">

    <div class="bg-white p-10 rounded-2xl shadow-lg max-w-md w-full text-center">
        <h1 class="text-3xl font-extrabold text-gray-800 mb-4">🚗 Fareed Motors</h1>
        <p class="text-gray-600 mb-6">Welcome to the Fareed Motors. Manage your vehicles and customers with ease.</p>
        
        <a href="{{ url('/vehicles') }}"
           class="inline-block px-6 py-3 bg-blue-600 text-white rounded-full shadow hover:bg-blue-700 transition">
            Go to Dashboard
        </a>
    </div>

</body>
</html>