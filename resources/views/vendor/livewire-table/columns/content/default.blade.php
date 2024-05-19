<div class="px-3 py-2 truncate text-black dark:text-black">
    @if($column->isRaw())
        {!! $value !!}
    @else
        {{ $value }}
    @endif
</div>
