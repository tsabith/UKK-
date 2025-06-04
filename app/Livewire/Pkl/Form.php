<?php

namespace App\Livewire\Pkl;

use App\Models\Guru; // relasi ke guru
use App\Models\Industri; // relasi ke industri
use App\Models\Pkl; // Changed from PKL
use App\Models\Siswa; // relasi ke siswa
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;


class Form extends Component
{
    public $id, $siswa_id, $industri_id, $guru_id, $tanggal_mulai, $tanggal_selesai;
    public $pklList = [];
    public $siswaList = [];
    public $industriList = [];
    public $guruList = [];
    public $userMail;
    
    // Add real-time validation for dates
    public function updatedTanggalMulai($value)
    {
        $this->validateOnly('tanggal_mulai');
        if ($this->tanggal_selesai) {
            $this->validateOnly('tanggal_selesai');
        }
    }

    public function updatedTanggalSelesai($value)
    {
        $this->validateOnly('tanggal_selesai');
    }

    public function mount($id = null)
    {
        $this->userMail = Auth::user()->email;

        $this->pklList = Pkl::all(); // Changed from PKL
        $this->siswaList = Siswa::all();
        $this->industriList = Industri::all();
        $this->guruList = Guru::all();

        if ($id) {
            $pkl = Pkl::findOrFail($id); // Changed from PKL
            $this->id = $pkl->id;
            $this->siswa_id = $pkl->siswa_id;
            $this->industri_id = $pkl->industri_id;
            $this->guru_id = $pkl->guru_id;
            $this->tanggal_mulai = $pkl->tanggal_mulai;
            $this->tanggal_selesai = $pkl->tanggal_selesai;
        }
    }

    public function rules()
    {
        return [
            'siswa_id' => 'required|exists:siswas,id',
            'industri_id' => 'required|exists:industris,id',
            'guru_id' => 'required|exists:gurus,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => [
                'required',
                'date',
                'after:tanggal_mulai',
                function ($attribute, $value, $fail) {
                    if ($this->tanggal_mulai && $value) {
                        try {
                            $start = \Carbon\Carbon::parse($this->tanggal_mulai);
                            $end = \Carbon\Carbon::parse($value);
                            $minimumEnd = $start->copy()->addDays(90);
                            
                            if ($end->lt($minimumEnd)) {
                                $remainingDays = $minimumEnd->diffInDays($end);
                                $fail('Durasi PKL harus minimal 90 hari. Tambahkan ' . $remainingDays . ' hari lagi.');
                            }
                        } catch (\Exception $e) {
                            $fail('Format tanggal tidak valid.');
                        }
                    }
                },
            ],
        ];
    }

    public function save()
    {
        $this->validate();

        DB::beginTransaction();

        try {
            // Temukan siswa berdasarkan email user yang login
            $siswa = Siswa::where('email', $this->userMail)->first();

            // Cek jika siswa ditemukan dan sudah punya laporan PKL
            if ($siswa && Pkl::where('siswa_id', $siswa->id)->exists()) { // Changed from PKL
                DB::rollBack();
                session()->flash('message', 'Input dibatalkan: Anda sudah pernah melaporkan PKL.');
                return redirect()->route('pkl');
            }

            Pkl::updateOrCreate( // Changed from PKL
                ['id' => $this->id],
                [
                    'siswa_id' => $this->siswa_id,
                    'industri_id' => $this->industri_id,
                    'guru_id' => $this->guru_id,
                    'tanggal_mulai' => $this->tanggal_mulai,
                    'tanggal_selesai' => $this->tanggal_selesai,
                ]
            );

            // Update status_lapor_pkl for the student
            $siswa = Siswa::find($this->siswa_id);
            if ($siswa) {
                $siswa->status_lapor_pkl = true;
                $siswa->save();
            }

            DB::commit();
            session()->flash('message', 'Laporan PKL berhasil disimpan.');

            return redirect()->route('pkl');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('pkl')->with('error', 'Terjadi kesalahan teknis, silakan ulangi.');
        }
    }

    public function render()
    {
        return view('livewire.pkl.form');
    }

}
