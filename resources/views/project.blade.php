<x-base>
    <div class="">

        <h1 class="text-2xl font-bold text-white mb-2">Project 📝</h1>
        <form action="{{ route('tasks.title') }}" method="POST" class="flex justify-between border border-gray-300 w-96 rounded-lg">
            @csrf
            <input type="text" name="title" class="border-none bg-transparent w-50" placeholder="Buat project baru" required>
            <input type="date" name="due_date" class="border-none bg-transparent w-10"required>
            <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-lg">Add</button>
        </form>

        <div class="flex flex-col mt-10 gap-2 text-white">
            <p class="text-gray-400">{{ $count }} Projek</p>
            @foreach( $titles as $title )
            <a href="/project/{{ $title->id }}" class="font-bold5"># {{ $title->title }}</a>
            @endforeach
        </div>
    </div>
</x-base>