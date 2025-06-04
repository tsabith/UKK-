<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\Siswa;

class Form extends Component
{
    // Deklarasi variabelnya
    public $id, $nama, $nis, $gender, $alamat, $kontak, $email, $foto;
    public $status_lapor_pkl = 0;

    public function mount($id = null)
    {
        if ($id) {
            $siswa = Siswa::findOrFail($id);
            $this->id = $siswa->id;
            $this->nama = $siswa->nama;
            $this->nis = $siswa->nis;
            $this->gender = $siswa->gender;
            $this->alamat = $siswa->alamat;
            $this->kontak = $siswa->kontak;
            $this->email = $siswa->email;
            $this->foto = $siswa->foto;
            $this->status_lapor_pkl = $siswa->status_lapor_pkl;
        }
    }

    // Validasi kolom (yang wajib diisi)
    public function rules()
    {
        return [
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:255|unique:siswas,nis,' . $this->id,
            'gender' => 'required|in:L,P',
            'alamat' => 'required|string',
            'kontak' => 'required|numeric',
            'email' => 'required|email|unique:siswas,email,' . $this->id,
            'status_lapor_pkl' => 'boolean',
        ];
    }

    // Simpan data
    public function save()
    {
        $this->validate();

        Siswa::updateOrCreate(
            ['id' => $this->id],
            [
                'nama' => $this->nama,
                'nis' => $this->nis,
                'gender' => $this->gender,
                'alamat' => $this->alamat,
                'kontak' => $this->kontak,
                'email' => $this->email,
                'foto' => $this->foto,
                'status_lapor_pkl' => $this->status_lapor_pkl,
            ]
        );

        session()->flash('message', 'Data siswa berhasil disimpan.');

        return redirect()->route('siswa');
    }

    public function render()
    {
        return view('livewire.siswa.form');
    }
}
