<x-layouts.app :title="__('Dashboard')">


@if(auth()->user()->hasRole('siswa'))
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="col-span-3">
        <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
            <div class="text-lg font-semibold text-gray-800">Selamat datang di dashboard PKL Stembayo, {{ auth()->user()->name }} 👋</div>
        </div>
    </div>
    <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Nama Siswa</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->name }}</div>
    </div>
    <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Email</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->email }}</div>
    </div>
    <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">NIS</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->siswa?->nis ?? 'Tidak ada NIS' }}</div>
    </div>
</div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="col-span-2">
        <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
            <div class="text-lg font-semibold text-gray-800">Selamat datang di dashboard PKL Stembayo, {{ auth()->user()->name }} 👋</div>
        </div>
    </div>
    <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Nama</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->name }}</div>
    </div>
    <div class="bg-white border rounded-xl p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Email</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->email }}</div>
    </div>
</div>
@endif

</x-layouts.app>
