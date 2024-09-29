<div class="bg-secondary w-1/5 h-screen fixed border-r border-neutral-600">
    {{-- <h3 class="px-10 mt-5 font-bold pb-2 text-white">{{ Auth::user()->name }}</h3> --}}
    <div class="dropdown dropdown-right mt-5 px-10 pb-2">
        <div tabindex="0" role="button" class="m-1">{{ Auth::user()->name }}</div>
        <ul tabindex="0" class="dropdown-content menu bg-zinc-800 border border-zinc-500 hover:border-zinc-300 z-[1] w-52 p-2">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">Logout</a></li>
            </form>
        </ul>
      </div>

    <ul class="px-10 py-3 border-y border-neutral-600">
        <li>
            <a href="/dashboard" class="flex gap-3 items-center">
                <x-home-icon/>
                <p class="text-white">Beranda</p>
            </a>
        </li>
        <li>
            <a href="/task" class="flex gap-3 items-center">
                <x-todo/>
                <p class="text-white">Tugas</p>
            </a>
        </li>
        <li>
            <a href="/message" class="flex gap-3 items-center">
                <x-inbox/>
                <p class="text-white">Kotak Masuk</p>
            </a>
        </li>
    </ul>
    <a href="/project" class="px-10 w-full flex justify-between pt-3">
        <p class="font-bold text-white">Project</p>
        <div class="flex gap-3 items-center">
            <x-arrow/>
        </div>
    </a>
</div>