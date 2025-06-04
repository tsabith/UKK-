<div class="">
    <div class="relative mb-6 w-full grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-6 flex justify-start items-center">
            <label for="search" class="text-sm font-medium text-gray-700"></label>
            <input wire:model.live="search" id="search" type="text" placeholder="Search siswa..." class="w-full md:w-72 px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-1 focus:ring-gray-500 transition duration-150 ease-in-out text-gray-700">
        </div>
        <div class="col-span-12 md:col-span-6 flex justify-between items-center space-x-4 flex-row-reverse space-x-reverse">
            <!-- Search form -->
            <div class="flex items-center space-x-4 ">
                <a href="{{ route('siswa.create') }}" class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-800 transition duration-200">
                Tambah Siswa
                </a>
                
            </div>
        </div>
    </div>

    <!-- Pesan Session -->
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif
    <div class="overflow-x-auto bg-white shadow-sm rounded" style="max-height: 60vh; overflow-y: auto;">
        <table class="w-full text-sm text-left rtl:text-right text-gray-400 dark:text-gray-400">
            <thead class="text-xs text-gray-200 uppercase bg-gray-600 dark:bg-gray-700 dark:gray-600">
                <tr>
                    <th scope="col" class="px-6 py-3 ">Nama</th>
                    <th scope="col" class="px-6 py-3">NIS</th>
                    <th scope="col" class="px-6 py-3">Status PKL</th>
                    <th scope="col" class="px-6 py-3">Kontak</th>
                    <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if ($siswaList && $siswaList->count())
                    @foreach ($siswaList as $siswa)
                        <tr class="border-b hover:bg-gray-50 transition duration-200 text-gray-600">
                            <td class="px-6 py-3">{{ $siswa->nama }}</td>
                            <td class="px-6 py-3">{{ $siswa->nis }}</td>
                            <td class="px-6 py-3">{{ $this->ketStatusPKL($siswa->status_lapor_pkl) }}</td>
                            <td class="px-6 py-3">{{ app('livewire')->current()->formatKontak($siswa->kontak) }}</td>
                            <td class="px-6 py-3 text-center">
                                <div x-data="{ open: false }" class="inline-block text-left">
                                    <button @click="open = !open" class="text-gray-600 hover:text-gray-800 focus:outline-none transition duration-200">
                                        &#8942;
                                    </button>
                                    <div x-show="open" x-transition @click.away="open = false"
                                        class="absolute right-0 mt-2 w-36 bg-white border border-gray-200 rounded shadow-md z-50">
                                        <a href="{{ route('siswa.show', ['id' => $siswa->id]) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 transition duration-150">View</a>
                                        <a href="{{ route('siswa.edit', ['id' => $siswa->id]) }}"
                                        class="block px-4 py-2 text-sm text-blue-600 hover:bg-gray-100 transition duration-150">Edit</a>
                                        <button wire:click="delete({{ $siswa->id }})"
                                            class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 transition duration-150">Hapus</button>
                                    </div>
                                </div>
                            </td>
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
    <div class="my-4">
        <!-- Pagination Links -->
        <div class="flex justify-between items-center mb-4">
            <!-- Page Size Selection -->
            <div class="flex items-center space-x-2">
                <label for="perPage" class="text-sm font-medium text-gray-700">Tampilkan:</label>
                <select wire:model="numpage" wire:change="updatePageSize($event.target.value)" id="perPage" class="px-3 py-2 border rounded">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="{{ $siswaList->total() }}">semua</option>
                </select>
                <span class="text-sm text-gray-700">data per halaman</span>

            </div>
            
            <!-- Pagination Controls -->
            <div class="flex justify-end">
                {{ $siswaList->links() }}
                <!-- 'vendor.pagination.tailwind' -->
            </div>
        </div>
    </div>
</div>
