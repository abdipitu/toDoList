<x-base>
    <h1 class="mb-10 text-2xl text-white font-bold">Kotak Masuk</h1>
    @if($messages->isEmpty())
        <p>No messages found.</p>
    @else
        <ul class="flex flex-col-reverse">
            @foreach($messages as $message)
            <div class="w-full rounded-lg bg-secondary p-4 border border-neutral-600 hover:border-neutral-500 mb-3">
                <li>'Hari ini waktunya untuk menyelesaikan tugas: <span class="font-bold">{{ $message->message }}</span> Selamat bekerja!' <br><span class="font-light">(Created at: {{ $message->created_at }})</span></li>
            </div>
            @endforeach
        </ul>
    @endif
</x-base>