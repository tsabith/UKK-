<div class="p-0 -mx-4">
    <h2 class="text-2xl font-semibold mb-6 text-center text-gray-600">
        {{ $id ? 'Edit Laporan' : 'Lapor PKL' }}
    </h2>

    <!-- Pesan Session -->
    @if (session()->has('message'))
        <div class="bg-gray-200 text-gray-700 p-2 mb-4 rounded text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="bg-white shadow-sm rounded-lg p-6">
        <form wire:submit.prevent="save" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Siswa -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Nama Siswa</label>
                    <select wire:model="siswa_id" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
                        <option value="">Cari nama anda</option>
                        @foreach($siswaList as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                    @error('siswa_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Industri Tujuan -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Industri Tujuan</label>
                    <select wire:model="industri_id" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
                        <option value="">Pilih industri tujuan anda</option>
                        @foreach($industriList as $industri)
                            <option value="{{ $industri->id }}">{{ $industri->nama }}</option>
                        @endforeach
                    </select>
                    @error('industri_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Guru Pembimbing -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Guru Pembimbing</label>
                    <select wire:model="guru_id" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
                        <option value="">Pilih guru pembimbing yang sesuai</option>
                        @foreach($guruList as $guru)
                            <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
                        @endforeach
                    </select>
                    @error('guru_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Mulai -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Tanggal Mulai</label>
                    <input type="date" wire:model="tanggal_mulai" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
                    @error('tanggal_mulai') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Tanggal Selesai -->
                <div>
                    <label class="block text-xs font-medium text-gray-700 mb-1">Tanggal Selesai</label>
                    <input type="date" wire:model="tanggal_selesai" class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-150">
                    @error('tanggal_selesai') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="flex justify-between pt-6">
                <a href="{{ route('pkl') }}" class="bg-gray-600 text-white px-6 py-3 rounded hover:bg-gray-800 transition duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-800 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>