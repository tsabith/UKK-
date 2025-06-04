<div class="">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-between items-center space-x-4">
            <div class="flex items-center space-x-2">
                
                <input wire:model.live="search" id="search" type="text" placeholder="Search guru..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-sm rounded" style="max-height: 70vh; overflow-y: auto;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-400 dark:text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-gray-200">Nama</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">NIP</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">Kontak</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">Email</th>
                </tr>
            </thead>
            <tbody>
                @if ($guruList && $guruList->count())
                    @foreach ($guruList as $guru)
                    <tr class="border-b hover:bg-gray-50 transition duration-200 text-gray-600">
                        <td class="px-6 py-3">{{ $guru->nama }}</td>
                        <td class="px-6 py-3">{{ $guru->nip }}</td>
                        <td class="px-6 py-3">{{ $guru->kontak }}</td>
                        <td class="px-6 py-3">{{ $guru->email }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center py-4">Tidak ada data ditemukan.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>
