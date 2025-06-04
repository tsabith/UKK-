<div class="p-4 bg-white shadow-sm rounded-lg">
    <h2 class="text-xl font-semibold mb-4 text-center">{{ $id ? 'Edit Siswa' : 'Tambah Siswa' }}</h2>

    <form wire:submit.prevent="save" class="space-y-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Nama -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" wire:model="nama" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nama') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- NIS -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">NIS</label>
                <input type="text" wire:model="nis" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('nis') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Gender -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Gender</label>
                <div class="flex gap-4">
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="gender" value="L" class="form-radio text-blue-600" />
                        <span class="ml-2 text-sm">Laki Laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" wire:model="gender" value="P" class="form-radio text-blue-600" />
                        <span class="ml-2 text-sm">Perempuan</span>
                    </label>
                </div>
                @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Alamat -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <textarea wire:model="alamat" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" rows="2"></textarea>
                @error('alamat') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Kontak -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kontak</label>
                <input type="text" wire:model="kontak" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('kontak') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" wire:model="email" class="w-full border border-gray-300 rounded-md px-3 py-1.5 focus:outline-none focus:ring-2 focus:ring-blue-500" />
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <!-- Status PKL -->
           
        </div>

        <div class="flex justify-between pt-4">
            <a href="{{ route('siswa') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-sm">
                Cancel
            </a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 text-sm">
                Simpan
            </button>
        </div>
    </form>
</div>