<x-base>
    <p class="text-2xl font-medium mb-10">Selamat datang, <span class="font-bold text-white">{{ Auth::user()->name }}</span>.</p>
    
    <div class="w-full rounded-lg bg-secondary border border-neutral-600 hover:border-neutral-500 text-center">
        <div class="p-2">

        </div>
        <a href="/task">
            <p class="border-t border-neutral-600 p-2">Lihat semua tugasmu.</p>
        </a>
        </div>
</x-base>