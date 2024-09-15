<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex">
            <div class="w-1/5 h-screen">
                <div class="pr-7">
                    <p>Today 📍</p>
                    <div class="flex justify-between">
                        <p class="font-semibold">My project</p>
                        <x-arrow />
                    </div>
                </div>
            </div>

            <div class="overflow-hidden sm:rounded-lg w-4/5">
                <h1 class="text-2xl font-bold text-white mb-2">Hari ini</h1>
                <div class="w-40">
                    <form action="{{ route('todos.store') }}" method="POST" class="mb-4 h-20 w-96 flex justify-center items-center">
                        @csrf
                        <input type="text" name="todo" class="border border-gray-300 p-2 w-full rounded-full bg-transparent" placeholder="Add your list" required>
                        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-full">Add</button>
                    </form>
                </div>

                @foreach($todo as $todos)
                            <li class="flex justify-between items-center mt-1">
                                <form action="{{ route('tasks.update', $todos->id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" name="is_completed" class="mr-2" onchange="this.form.submit()" {{ $todos->is_completed ? 'checked' : '' }}>
                                    <span class="{{ $todos->is_completed ? 'line-through' : '' }}">{{ $todos->todo }}</span>
                                </form>
                            </li>
                        @endforeach
            </div>
        </div>
    </div>
</x-app-layout>