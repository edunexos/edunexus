<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNexus Calendar</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>
<body class="bg-gray-100">
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-100 p-2">


        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">Log in</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">Register</a>
            </div>
        </div>
    </nav>

    <!-- Calendar Section -->
    <div class="container mx-auto p-6">
        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Calendar</h2>
            <p class="text-gray-500 text-sm leading-relaxed">...</p>
            <!-- Include your calendar component here -->
            <div id="app">
                <calendar-component></calendar-component>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-gray-600">
        EduNexus &copy; 2024. All rights reserved.
    </footer>
</body>
</html>
