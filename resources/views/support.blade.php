<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Support') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-6">Support</h1>
                <p class="text-gray-700 mb-4">
                    Welcome to the support page. Here you can find assistance with any issues you may encounter.
                </p>

                <div class="mt-6">
                    <h2 class="text-xl font-semibold">Incident Team</h2>
                    <p class="text-gray-700 mb-4">
                        Our incident team is here to help you with any technical problems you might face. Feel free to reach out to us for assistance.
                    </p>
                    <ul class="list-disc list-inside">
                        <li>John Doe - john.doe@example.com</li>
                        <li>Jane Smith - jane.smith@example.com</li>
                        <li>Support Team - support@example.com</li>
                    </ul>
                </div>

                <div class="mt-8">
                    <h2 class="text-xl font-semibold">Chatbot / Ticketing Service</h2>
                    <p class="text-gray-700 mb-4">
                        We are working on integrating a chatbot and a ticketing service to provide you with even better support. Stay tuned for updates!
                    </p>

                    <!-- Placeholder for future chatbot or ticketing service -->
                    <div class="bg-gray-100 p-6 rounded-lg">
                        <p class="text-gray-500">Chatbot / Ticketing service will be available here soon.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
