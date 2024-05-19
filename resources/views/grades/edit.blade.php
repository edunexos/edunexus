<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Grade') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
                        @csrf
                        @method('PUT')

                        <div>
                            <x-label for="course_id" :value="__('Course')" />
                            <select name="course_id" id="course_id" class="block mt-1 w-full">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}" {{ $grade->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-4">
                            <x-label for="task" :value="__('Task')" />
                            <x-input id="task" class="block mt-1 w-full" type="text" name="task" value="{{ $grade->task }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="grade" :value="__('Grade')" />
                            <x-input id="grade" class="block mt-1 w-full" type="text" name="grade" value="{{ $grade->grade }}" required />
                        </div>

                        <div class="mt-4">
                            <x-label for="resource_id" :value="__('Resource')" />
                            <select name="resource_id" id="resource_id" class="block mt-1 w-full">
                                @foreach ($resources as $resource)
                                    <option value="{{ $resource->id }}" {{ $grade->resource_id == $resource->id ? 'selected' : '' }}>
                                        {{ $resource->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
