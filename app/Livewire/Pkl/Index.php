<?php

namespace App\Livewire\Pkl;

use App\Models\Pkl; // Changed from PKL
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function delete($id)
    {
        Pkl::findOrFail($id)->delete(); // Changed from PKL
        session()->flash('message', 'Data PKL berhasil dihapus.');
    }

    public function render()
    {
        $query = Pkl::query(); // Changed from PKL

        if (!empty($this->search)) {
            $query->join('siswas', 'pkls.siswa_id', '=', 'siswas.id')
                  ->join('industris', 'pkls.industri_id', '=', 'industris.id')
                  ->join('gurus', 'pkls.guru_id', '=', 'gurus.id')
                  ->where(function ($q) {
                      $q->where('siswas.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('industris.nama', 'like', '%' . $this->search . '%')
                        ->orWhere('gurus.nama', 'like', '%' . $this->search . '%');
                  });
        }

        $pklList = $query->select('pkls.*')->paginate($this->numpage);

        return view('livewire.pkl.index', [
            'pklList' => $pklList,
        ]);
    }

}
