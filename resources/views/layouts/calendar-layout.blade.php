<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    @livewireStyles
</head>
<body x-data="{ close: false }" class="font-inter antialiased">
    <x-banner />

    <div :class="{'sm:ml-[280px]': ! close, 'left-0': close}" class="min-h-screen sm:ml-[280px] transition-all duration-300">
        <div class="sticky top-0">
            @livewire('navigation-menu')
        </div>

        <!-- Page Content -->
        @livewire('SidebarNavigation')
        <main>
            @yield('header')
            @yield('content')
        </main>
    </div>

    @stack('modals')
    @livewire('wire-elements-modal')
    @livewireScripts
</body>
</html>
