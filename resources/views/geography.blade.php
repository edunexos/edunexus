<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Map') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div id="react-app"></div>
                <script type="module" src="{{ asset('react-app/assets/assets/assets/index-3Rx6JfzQ.js') }}"></script>
                <link rel="stylesheet" href="{{ asset('react-app/assets/assets/index-SLr2xUag.css') }}">
            </div>
        </div>
    </div>
</x-app-layout>
