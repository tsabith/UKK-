<?php

namespace App\Livewire\Siswa;

use App\Models\Siswa;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
	// Memanggil pagination
	use WithPagination;

	// Deklarasi variabel numpage dan search
	public $numpage = 10;
	public $search;

	// Reset halaman setelah search
	public function updatingSearch()
	{
    	$this->resetPage();
	}

	// Menghapus data
	public function delete($id)
	{
        $siswa = Siswa::findOrFail($id);
        
        // Cek apakah siswa memiliki data PKL
        if ($siswa->pkl()->exists()) {
            session()->flash('message', 'Data siswa tidak dapat dihapus karena masih terdaftar di PKL.');
            return;
        }

        $siswa->delete();
        session()->flash('message', 'Data siswa berhasil dihapus.');
	}

	// Method untuk render keseluruhan
	public function render()
	{
    	// Ambil query, logika search query
    	$query = Siswa::query();

    	if (!empty($this->search)) {
        	$query->where('nama', 'like', '%' . $this->search . '%')
              	->orWhere('nis', 'like', '%' . $this->search . '%');
    	}

    	$this->siswaList = $query->paginate($this->numpage);

    	return view('livewire.siswa.index', [
        	'siswaList' => $this->siswaList,
    	]);
	}

	// Update ukuran halaman (dengan filter tampilan data)
	public function updatePageSize($size)
	{
    	$this->numpage = $size;
	}
    
	// Function gender
	public function ketGender($gender)
	{
    	if ($gender === 'L') {
        	return 'Laki-laki';
    	} elseif ($gender === 'P') {
        	return 'Perempuan';
    	} else {
        	return 'Status tidak diketahui';
    	}
	}

	// Function Status PKL
	public function ketStatusPKL($status_lapor_pkl)
	{
		// Cast the input to integer to handle potential boolean/string representations of tinyint(1)
		// $status = (int) $status_lapor_pkl;

		// Cast the input to integer to handle potential boolean/string representations of tinyint(1)
		// $status = (int) $status_lapor_pkl;

		if ($status_lapor_pkl === 0) {
			return 'Belum diterima PKL';
		} elseif ($status_lapor_pkl === 1) {
			return 'Sudah diterima PKL';
		} else {
			return 'Status tidak diketahui';
		}
	}

    // Format nomor kontak ke format (+62)xxx
    public function formatKontak($kontak)
    {
        // Hilangkan spasi dan karakter non-digit
        $kontak = preg_replace('/\D/', '', $kontak);
        // Jika nomor diawali 0, ganti dengan +62
        if (substr($kontak, 0, 1) === '0') {
            $kontak = '+62' . substr($kontak, 1);
        } elseif (substr($kontak, 0, 2) === '62') {
            $kontak = '+62' . substr($kontak, 2);
        } elseif (substr($kontak, 0, 3) !== '+62') {
            $kontak = '+62' . $kontak;
        }
        return $kontak;
    }
}
