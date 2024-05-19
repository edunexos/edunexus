@props(['icon', 'label', 'count' => 0])

<div class="md:relative z-10" x-data="{ show: false }">
    <button
        class="flex items-center gap-1 px-3 py-2 bg-neutral-800 border border-neutral-700 text-black hover:bg-neutral-700 focus:border-gray-500 active:bg-neutral-600 active:text-grey transition ease-in-out rounded-md shadow-sm h-full text-sm dark:bg-white dark:border-neutral-200 dark:focus:border-gray-400 dark:text-neutral-800 dark:hover:bg-neutral-100 dark:active:bg-neutral-200"
        @if (isset($label)) title="{{ $label }}"
            aria-label="{{ $label }}" @endif
        x-on:click="show = !show">
        {{ $icon ?? '' }}
        @if ($count > 0)
            <span class="bg-blue-500 text-white rounded-full px-2">{{ $count }}</span>
        @endif
    </button>
    <div class="w-full md:w-56 absolute right-0 text-black bg-white mt-2 shadow-xl rounded border border-neutral-200 overflow-y-auto max-h-56 dark:text-white dark:bg-neutral-800 dark:border-neutral-700"
        x-show="show" x-on:click.away="show = false" style="display: none;">
        {{ $slot }}
    </div>
</div>
