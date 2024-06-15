@section('title', 'Educational Games')

<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">All Games</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($games as $game)
                <a href="{{ route($game->url) }}" class="transform hover:scale-105 transition-transform duration-300">
                    <div class="relative bg-white rounded-lg shadow-lg overflow-hidden h-60 flex flex-col">
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-xl font-semibold text-black mb-2 truncate">{{ $game->title }}</h2>
                            <p class="text-black">{{ $game->description }}</p>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-200 via-white to-blue-100 opacity-50"></div>
                    </div>
                </a>
            @endforeach
			<a href="https://edunexus.alumnes-monlau.com/geo" class="transform hover:scale-105 transition-transform duration-300">
                    <div class="relative bg-white rounded-lg shadow-lg overflow-hidden h-60 flex flex-col">
                        <div class="p-6 flex flex-col flex-1">
                            <h2 class="text-xl font-semibold text-black mb-2 truncate">Geography</h2>
                            <p class="text-black">Game to learn Geography in an interactive way</p>
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-r from-gray-200 via-white to-blue-100 opacity-50"></div>
                    </div>
                </a>
        </div>
    </div>
</div>
