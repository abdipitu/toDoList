<x-base>
    <div class="">

        <h1 class="text-2xl font-extrabold text-white mb-2 font-alegreya">PROYEK 📝</h1>
        <form action="{{ route('tasks.title') }}" method="POST" class="flex justify-between border border-gray-300 w-96 rounded-lg">
            @csrf
            <input type="text" name="title" class="border-none bg-transparent w-50" placeholder="Buat project baru" required>
            <input type="date" name="due_date" class="border-none bg-transparent w-10"required>
            <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-lg">Add</button>
        </form>

        <div class="flex flex-col mt-10 text-white">
            <p class="text-gray-400">{{ $count }} Projek</p>
            @foreach( $titles as $title )
            <div class="flex justify-between items-center">
                <a href="/project/{{ $title->id }}" class="font-bold"># {{ $title->title }}</a>
                <form action="{{ route('title.destroy', $title) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-xl">x</button>
                </form>
            </div>
            {{-- <p class="font-light text-sm">{{ $title->due_date }}</p> --}}
            @endforeach
        </div>
    </div>
</x-base>