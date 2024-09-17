<x-base>
    <h1 class="text-2xl font-bold text-white mb-2">Tugas</h1>
    <form action="{{ route('todos.store') }}" method="POST" class="flex justify-between border border-gray-300 w-full rounded-lg">
        @csrf
        <input type="text" name="todo" class="border-none bg-transparent w-50" placeholder="Buat tugas baru" required>
        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-lg">Add</button>
    </form>

    <div class="mt-10">
        @foreach($todo as $todos)
        <form action="{{ route('todos.update', $todos->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <li class="flex gap-3 items-center mt-1">
                <input type="checkbox" name="is_completed" id="task_{{ $todos->id }}" class="peer accent-red-500" {{ $todos->is_completed ? 'checked' : '' }} 
                onchange="this.form.submit()">
                <label for="task_{{ $todos->id }}" class="peer-[:checked]:text-slate-200 peer-[:checked]:line-through">{{ $todos->todo }}</label>
                <form :action="route('todos.destroy', $todo)" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500 text-xl"></button>
                </form>
            </li>
        </form>
        @endforeach

        {{-- @if (session()->has('success'))
            <x-alert message="{{session('success')}}"/>
        @endif --}}
    </div>
</x-base>