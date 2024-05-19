<div class="max-w-md mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-lg font-semibold mb-4">Add Resource</h2>
    <form wire:submit.prevent="saveResource">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model="title" placeholder="Title" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
            @error('title') <span class="text-red-800">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">File</label>
            <input type="file" id="file" wire:model="file" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
            @error('file') <span class="text-red-800">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="resource_type" class="block text-sm font-medium text-gray-700">Resource Type</label>
            <select id="resource_type" wire:model="resource_type" class="mt-1 block w-full p-2 border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm">
                <option value="ppt">PPT</option>
                <option value="pdf">PDF</option>
            </select>
            @error('resource_type') <span class="text-red-800">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
            <textarea id="content" wire:model="content" placeholder="Content" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-gray-500 focus:border-gray-500 sm:text-sm"></textarea>
            @error('content') <span class="text-red-800">{{ $message }}</span> @enderror
        </div>
        <div class="flex justify-end">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-gray-500 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                Save
            </button>
            <button type="button" wire:click="closeModal" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-500 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Cancel
            </button>
        </div>
    </form>
</div>
