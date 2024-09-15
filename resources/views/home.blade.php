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

                    {{-- <form action="{{ route('tasks.store') }}" method="POST" class="mb-4 h-20 flex items-center justify-center">
                        @csrf
                        <select name="title_id" id="title" class="rounded-full border border-gray-300 text-black w-20">
                            @foreach(App\Models\Title::all() as $title)
                            <option value="{{$title->id}}">{{$title->title}}</option>
                            @endforeach
                        </select>
                        <input type="text" name="title" class="border border-gray-300 p-2 w-full rounded-full bg-transparent" placeholder="Add your list" required>
                        <button type="submit" class="bg-red-500 text-white p-3 w-20 rounded-full">Add</button>
                    </form> --}}


                    {{-- <ul class="p-4">
                        @foreach($titles as $title)
                        <div class="flex justify-between mt-5">
                            <p class="font-bold">{{ $title->title }}</p>
                            <a href="/destroy/{{ $title->id }}">x</a>
                        </div>
                        <p class="text-sm -mt-1 -mb-1 text-zinc-400"><span>{{ $title->day }}, </span>{{ \Carbon\Carbon::parse($title->due_date)->locale('id')->translatedFormat('d F Y') }}</p>
                        @foreach($title->tasks()->get() as $task)
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
                                    <button type="submit" class="text-red-500 text-xl">x</button>
                                </form>
                            </li>
                        @endforeach
                        @endforeach
                    </ul> --}}
                    {{-- @if (session()->has('success'))
                    <x-alert message="{{session('success')}}"/>
                    @endif

                    @php
                        $shouldShowAlert = $title->due_date === $today;
                    @endphp

                    <x-alert-date :title="$title" :shouldShowAlert="$shouldShowAlert" /> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
