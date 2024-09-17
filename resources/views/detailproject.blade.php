<x-base>
    <h2 class="text-2xl font-bold text-white"># {{ $project->title }}</h2>
    <p class="mb-3">{{ \Carbon\Carbon::parse($project->due_date)->locale('id')->translatedFormat('d F Y') }}</p>

    <form action="{{ route('tasks.store') }}" method="POST" class="flex justify-between border border-gray-300 w-96 rounded-lg mb-10">
        @csrf
        <input type="hidden" name="title_id" value="{{ request()->route('id') }}">
        <input type="text" name="title" class="border-none bg-transparent w-50" placeholder="Buat tugas baru" required>
        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-lg">Add</button>
    </form>

    <!-- Menampilkan tugas -->
    @foreach($project->tasks()->get() as $task)
        <li class="flex justify-between items-center mt-1">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center">
                @csrf
                @method('PATCH')
                <input type="checkbox" name="is_completed" class="mr-2" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->name }}</span>
            </form>

            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 text-xl">
                x
            </button>
            </form>
        </li>
    @endforeach

</x-base>