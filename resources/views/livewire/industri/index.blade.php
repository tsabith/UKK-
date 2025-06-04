<div class="">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-between items-center space-x-4">
            <div class="flex items-center space-x-2">
                
                <input wire:model.live="search" id="search" type="text" placeholder="Search industri..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150 ease-in-out">
            </div>
        </div>
    </div>
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-sm rounded" style="max-height: 70vh; overflow-y: auto;">
        <table class="table-auto w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-gray-200">Nama</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">Bidang Usaha</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">Alamat</th>
                    <th scope="col" class="px-6 py-3 text-gray-200">Kontak</th>
                    
                    
                </tr>
            </thead>
            <tbody>
                @foreach ($industriList as $industri)
                <tr class="border-b hover:bg-gray-50 whitespace-nowrap">
                    <td class="px-6 py-3">{{ $industri->nama }}</td>
                    <td class="px-6 py-3">{{ \Illuminate\Support\Str::limit($industri->bidang_usaha, 25) }}</td>
                    <td class="px-6 py-3">{{ \Illuminate\Support\Str::limit($industri->alamat, 25) }}</td>
                    <td class="px-6 py-3">{{ $industri->kontak }}</td>
                    <!-- Relasi ke guru -->
            
                   
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
