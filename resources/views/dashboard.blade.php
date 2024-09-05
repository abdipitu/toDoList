<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 bg-zinc-800 rounded-lg text-white w-96 mx-auto">

                    <h1 class="text-2xl font-bold text-center mb-4">ToDo-List 📝</h1>
                    <form action="{{ route('tasks.title') }}" method="POST" class="flex justify-between border border-gray-300 w-full rounded-full">
                        @csrf
                        <input type="text" name="title" class="border-none bg-transparent w-50" placeholder="Add your title" required>
                        <input type="date" name="due_date" class="border-none bg-transparent w-10"required>
                        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-full">Add</button>
                    </form>

                    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4 h-20 flex items-center justify-center">
                        @csrf
                        <select name="title_id" id="title" class="rounded-full border border-gray-300 text-black w-20">
                            @foreach(App\Models\Title::all() as $title)
                            <option value="{{$title->id}}">{{$title->title}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="title" class="border border-gray-300 p-2 w-full rounded-full bg-transparent" placeholder="Add your list" required>
                        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-full">Add</button>
                    </form>


                    <ul class="p-4">
                        @foreach($titles as $title)
                        <div class="flex justify-between">
                            <p class="font-bold">{{ $title->title }}</p>
                            <a href="/destroy/{{ $title->id }}">x</a>
                        </div>
                        <p class="text-sm -mt-1 text-zinc-400"><span>{{ $title->day }}, </span>{{ \Carbon\Carbon::parse($title->due_date)->locale('id')->translatedFormat('d F Y') }}</p>
                        @foreach($title->tasks()->get() as $task)
                            <li class="flex justify-between items-center mb-2 mt-1">
                                <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="flex items-center">
                                    @csrf
                                    @method('PATCH')
                                    <input type="checkbox" name="is_completed" class="mr-2" onchange="this.form.submit()" {{ $task->is_completed ? 'checked' : '' }}>
                                    <span class="{{ $task->is_completed ? 'line-through' : '' }}">{{ $task->name }}</span>
                                </form>

                                {{-- <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-xl">x</button>
                                </form> --}}
                            </li>
                        @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
