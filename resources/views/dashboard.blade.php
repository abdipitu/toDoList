<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 w-96 mx-auto">

                    <h1 class="text-2xl font-bold text-center mb-4">ToDo-List</h1>

                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
                        @csrf
                        <input type="text" name="title" class="border border-gray-300 p-2 w-full" placeholder="Task title" required>
                        <button type="submit" class="bg-blue-500 text-white p-2 w-full mt-2">Tambah Task</button>
                    </form>

                    <ul class="p-4">
                        @foreach($tasks as $task)
                            <li class="flex justify-between items-center mb-2">
                                <form action="{{ route('tasks.update', $task) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" name="is_completed" class="mr-2" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                                    <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->title }}</span>
                                </form>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"><x-delete-icon /></button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
