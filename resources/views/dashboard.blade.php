<x-layouts.app :title="__('Dashboard')">


@if(auth()->user()->hasRole('siswa'))
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <div class="col-span-3">
        <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
            <div class="text-lg font-semibold text-gray-800">Selamat datang di dashboard PKL Stembayo, {{ auth()->user()->name }} 👋</div>
        </div>
    </div>
    <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Nama Siswa</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->name }}</div>
    </div>
    <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Email</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->email }}</div>
    </div>
    <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">NIS</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->siswa?->nis ?? 'Tidak ada NIS' }}</div>
    </div>

    <!-- Status PKL Card -->
    <div class="col-span-3 row-span-2">
        <div class="bg-white border rounded p-6 shadow-sm flex flex-col items-center text-center">
            @if(auth()->user()->siswa?->status_lapor_pkl)
                <!-- Success State -->
                <div class="mb-4 p-3 rounded-full bg-green-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-green-600"><path d="M20 6 9 17l-5-5"/></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Terima Kasih!</h3>
                <p class="text-gray-600 mb-4">Anda telah mengisi laporan PKL dengan baik.</p>
            @else
                <!-- Warning State -->
                <div class="mb-4 p-3 rounded-full bg-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-red-600"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Laporan PKL Belum Diisi</h3>
                <p class="text-gray-600 mb-4">Silahkan isi laporan PKL Anda untuk melengkapi persyaratan.</p>
                <a href="{{ route('pkl.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                    <span class="mr-2">Isi Laporan PKL</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                </a>
            @endif
        </div>
    </div>
</div>
@else
<div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
    <div class="col-span-2">
        <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
            <div class="text-lg font-semibold text-gray-800">Selamat datang di dashboard PKL Stembayo, {{ auth()->user()->name }} 👋</div>
        </div>
    </div>
    <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Nama</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->name }}</div>
    </div>
    <div class="bg-white border rounded p-4 shadow-sm flex flex-col">
        <div class="text-xs text-gray-500 mb-1">Email</div>
        <div class="font-semibold text-gray-800">{{ auth()->user()->email }}</div>
    </div>
</div>
@endif

</x-layouts.app>
