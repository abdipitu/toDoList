<div 
    x-data="{ show: @json($shouldShowAlert) }" 
    x-init="setTimeout(() => show = false, 5000)"
    x-show="show" 
    class="bg-red-500 text-white p-4 rounded-lg mb-4 transition-opacity duration-500"
    x-transition:leave="opacity-100"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <strong>Perhatian!</strong> Tugas "{{ $title->title }}" sudah jatuh tempo hari ini!
</div>
