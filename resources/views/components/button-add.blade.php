<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex gap-2 items-center p-3 bg-gray-300 rounded-md font-semibold text-black tracking-widest hover:bg-gray-400 transition-all duration-200']) }}>
    <img src="{{asset('assets/img/IconAdd.svg')}}" alt="">
    <p class="text-sm">{{ $slot }}</p>
</button>

