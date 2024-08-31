<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 w-96 mx-auto">

            <h1 class="text-2xl font-bold text-center mb-4">Arsip ToDo-List</h1>
    
            <ul class="bg-white rounded-lg p-4">
                @foreach($archives as $archive)
                    <li class="mb-2 flex justify-between">
                        <p class="font-bold">{{ $archive->title }}</p>
                        <p class="text-zinc-400">(Deleted on: {{ $archive->deleted_at->format('d M Y') }})</p>
                    </li>
                @endforeach
            </ul>
    
            <a href="{{ route('dashboard') }}" class="text-blue-500 mt-4 block text-center">Kembali ke To-Do List</a>
        </div>
    </div>
</div>
</div>
</x-app-layout>