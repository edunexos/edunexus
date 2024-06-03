@section('title', 'Dashboard')

<div class="py-12 bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
            <div class="grid grid-cols-1 {{ auth()->user()->role === 'admin' ? 'md:grid-cols-2' : '' }} gap-6 mb-6">
                <!-- User Profile -->
                <div class="bg-green-100 p-4 rounded-lg flex flex-col items-center">
                    <img src="{{ auth()->user()->profile_photo_url }}" alt="User Profile Photo"
                        class="rounded-full h-16 w-16 mb-4 cursor-pointer"
                        onclick="window.location='{{ route('profile.show') }}'">
                    <p class="text-xl font-semibold">{{ auth()->user()->name }}</p>
                    <p>{{ auth()->user()->role }}</p>
                </div>

                @if(auth()->user()->role === 'admin')
                    <!-- User Management Link -->
                    <div class="bg-blue-100 p-4 rounded-lg text-center">
                        <p class="text-lg font-medium text-gray-900 mb-2">Manage Users</p>
                        <a href="{{ route('user-management') }}" class="text-blue-500 hover:underline">Go to User Management</a>
                        <p class="text-gray-600 mt-2">You can manage all users in the User Management section.</p>
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Class Lists -->
                <div class="col-span-1">
                    <div class="bg-gray-100 p-4 rounded-lg mb-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Class Lists</h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($allCourses as $course)
                                @if(auth()->user()->role === 'admin' || (auth()->user()->role === 'teacher' && $course->teachers->contains(auth()->user())) || (auth()->user()->role === 'student' && $course->students->contains(auth()->user())))
                                    <div class="bg-white p-4 rounded-lg shadow-md mb-4">
                                        <h4 class="text-xl font-semibold mb-2 truncate">{{ $course->title }}</h4>
                                        <p class="text-gray-600 mb-4">{{ $course->description }}</p>
                                        <div class="flex flex-wrap">
                                            @foreach ($course->teachers as $teacher)
                                                <span class="bg-gray-200 text-gray-800 px-2 py-1 rounded-full text-xs mr-2 mb-2 truncate"
                                                    title="{{ $teacher->name }}">{{ $teacher->name }}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Calendar -->
                <div class="col-span-1">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">Calendar</h3>
                        <div class="bg-white p-4 rounded-lg shadow-md">
                            <div id="app">
                                <calendar-component></calendar-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($isModalOpen)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M13 16h-1v-4h-1m1-4h.01m-6.938 4h6.938M10 16v4m0 0h-1v-4h-1m1-4h.01m-6.938 4h6.938" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">
                                    @if ($isUpdating)
                                        Update Course
                                    @else
                                        Create Course
                                    @endif
                                </h3>
                                <div class="mt-2">
                                    <input type="text" wire:model="title" placeholder="Title"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                    @error('title')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                    <textarea wire:model="description" placeholder="Description"
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
                                    @error('description')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                    <select wire:model="teachers" multiple
                                        class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                                        @foreach ($allTeachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('teachers')
                                        <span class="text-red-500">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm"
                            wire:click="@if ($isUpdating) update() @else store() @endif">
                            @if ($isUpdating)
                                Update Course
                            @else
                                Create Course
                            @endif
                        </button>
                        <button type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm"
                            wire:click="closeModal()">
                            Cancel
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @vite('resources/js/app.js')
</div>
