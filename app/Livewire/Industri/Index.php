<?php

namespace App\Livewire\Industri;

use Livewire\Component;
use App\Models\Industri;
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
        $industri = Industri::findOrFail($id);
        
        // Cek apakah industri memiliki data PKL
        if ($industri->pkl()->exists()) {
            session()->flash('message', 'Data industri tidak dapat dihapus karena masih terdaftar di PKL.');
            return;
        }

        $industri->delete();
        session()->flash('message', 'Data industri berhasil dihapus.');
    }

    public function render()
    {
        $query = Industri::query();
        
        if (!empty($this->search)) {
        $query->where('industris.nama', 'like', '%' . $this->search . '%');
                
                
        }

        $this->industriList = $query->select('industris.*')->paginate($this->numpage);

        return view('livewire.industri.index', [
            'industriList' => $this->industriList,
        ]);
    }

}
