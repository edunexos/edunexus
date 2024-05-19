<div :class="{'sm:left-0': ! close, 'sm:left-[-280px]': close}" class="py-3 px-5 h-full w-[280px] fixed top-0 left-[-280px] sm:left-0 transition-all duration-300 shadow-lg bg-gray-50">
    <div class="flex items-center justify-around gap-14 mb-5">
        <a href="{{ route('dashboard') }}">
            <x-application-mark class="block h-9 w-auto" />
        </a>
        <button @click="close = ! close" type="button">
            <img class="mt-1 cursor-pointer" src="{{asset('assets/img/IconSidebar.svg')}}" alt="icon sidebar">
        </button>
    </div>
    <div class="flex flex-col divide-y-[2px] divide-slate-300 gap-5">
        <ul>
            <a href="{{ route('courses') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('courses')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-500 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-book mx-2"></i>
                    Courses
                </li>
            </a>
            <a href="{{ route('educational-games') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('educational-games')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-gamepad mx-2"></i>
                    EduNexus Games
                </li>
            </a>
            <a href="{{ route('calendar') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('calendar')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-calendar-alt mx-2"></i>
                    Calendar
                </li>
            </a>
            <a href="{{ route('grades.index') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('grades.index')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-pencil-alt mx-2"></i>
                    Grades
                </li>
            </a>
            @if(auth()->user()->isAdmin())
            <a href="{{ route('user-management') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('user-management')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-users-cog mx-2"></i>
                    User Management
                </li>
            </a>
            @endif
        </ul>
        <ul class="pt-5">
            <a href="{{ route('profile.show') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ request()->routeIs('profile.show') ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-user mx-2"></i>
                    Profile
                </li>
            </a>
            <a href="{{ route('support') }}" class="leading-[30px] font-medium text-[16px]">
                <li class="{{ Str::startsWith(request()->url(), route('support')) ? 'bg-gray-800 text-white' : 'bg-gray-300 text-gray-700 hover:bg-gray-400' }} flex items-center gap-1 my-3 p-2 rounded-[8px]">
                    <i class="fas fa-life-ring mx-2"></i>
                    Support
                </li>
            </a>
        </ul>
    </div>
</div>
