<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduNexus</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
</head>

<body class="bg-gray-100">
    <!-- Navbar -->
    <nav x-data="{ open: false }" class="bg-white border-b-2 border-gray-100 p-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-[70px]">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center gap-10">
                        <a href="#" class="block">
                            <img class="block cursor-pointer h-10" src="{{ asset('assets/img/Logo.svg') }}" alt="logo">
                        </a>
                        <h1 class="text-2xl font-bold"></h1>
                    </div>
                </div>

                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    @if (Route::has('login'))
                        <nav class="flex justify-end">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">Register</a>
                                @endif
                            @endauth
                        </nav>
                    @endif
                </div>

                <!-- Hamburger -->
                <div class="-me-2 flex items-center sm:hidden">
                    <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">Log in</a>
                <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700 rounded-md hover:bg-gray-100">Register</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="mt-6 flex justify-center items-center min-h-[calc(100vh-160px)]">
        <div class="bg-white rounded-lg shadow-lg p-8 max-w-2xl text-center">
            <h1 class="text-3xl font-bold text-black mb-4">Welcome to EduNexus</h1>
            <p class="text-gray-700 text-lg mb-6">
                EduNexus is a school management system that integrates essential student tracking with interactive and cognitive games. Our platform combines traditional learning practices with fun, engaging methods to enhance both teaching and learning experiences.
            </p>
        </div>
    </main>

    <!-- Features Section -->
    <section class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">Student Tracking</h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Track student progress and performance with ease. EduNexus provides detailed analytics and reporting to help you monitor student achievements and identify areas for improvement.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                    <path stroke-linecap="round" d="M15.75 10.5l4.72-4.72a.75.75 0 011.28.53v11.38a.75.75 0 01-1.28.53l-4.72-4.72M4.5 18.75h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25h-9A2.25 2.25 0 002.25 7.5v9a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">Interactive Games</h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Make learning fun with interactive games that enhance cognitive skills. Our platform includes a variety of educational games designed to engage students and improve their learning experience.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">Easy to Use</h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                EduNexus is user-friendly and easy to navigate. Our intuitive interface ensures that both teachers and students can use the platform with minimal training.
            </p>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="w-6 h-6 stroke-gray-400">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                </svg>
                <h2 class="ms-3 text-xl font-semibold text-gray-900">Secure</h2>
            </div>
            <p class="mt-4 text-gray-500 text-sm leading-relaxed">
                Security is a top priority at EduNexus. We implement the latest security protocols to ensure that all user data is protected and secure.
            </p>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-8 text-center text-sm text-gray-600">
        EduNexus &copy; 2024. All rights reserved.
    </footer>
</body>
</html>
