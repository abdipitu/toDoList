<x-base>
    <p class="text-2xl font-medium mb-10">Selamat datang, <span class="font-bold text-white">{{ Auth::user()->name }}</span>.</p>

    <div class="flex items-start gap-10">
        <div class="w-full rounded-lg bg-secondary border border-neutral-600 hover:border-neutral-500 text-center h-96 hover:drop-shadow-xl hover:shadow-white animate-light-swipe">
            <div class="p-10">
                <p class="text-2xl font-extrabold text-white mb-5 text-start font-alegreya">TUGAS</p>
                @foreach ($data as $item)
                <div class="flex gap-3 text-start items-center">
                    <input type="checkbox">
                    <label for="#">{{ $item->todo }}</label>
                </div>
                @endforeach
            </div>
            <a href="/task">
                <p class="border-t border-neutral-600 p-2">Lihat semuta tugasmu.</p>
            </a>
        </div>
    
        <div class="w-full rounded-lg bg-secondary border border-neutral-600 hover:border-neutral-500 text-center h-96">
            <div class="p-10 mb-6">
                <p class="text-2xl font-extrabold text-white mb-5 text-start font-alegreya">PROJECT</p>
                @foreach ($dataProyek as $itemProyek)
                <div class="flex gap-3 text-start">
                    <p># <span>{{ $itemProyek->title }}</span></p>
                </div>
                @endforeach
            </div>
            <a href="/task">
                <p class="border-t border-neutral-600 p-2">Lihat semua projectmu.</p>
            </a>
        </div>
    </div>
    
</x-base>