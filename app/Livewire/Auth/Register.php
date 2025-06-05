<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        // Check if email exists in siswa or guru table
        $siswa = Siswa::where('email', $this->email)->first();
        $guru = Guru::where('email', $this->email)->first();
        
        if (!$siswa && !$guru) {
            throw ValidationException::withMessages([
                'email' => __('Email tidak terdaftar di database siswa atau guru. Silahkan hubungi administrator.'),
            ]);
        }

        // Check if this person already has a user account
        if (($siswa && $siswa->user_id !== null) || ($guru && $guru->user_id !== null)) {
            throw ValidationException::withMessages([
                'email' => __('Akun untuk email ini sudah terdaftar sebelumnya.'),
            ]);
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Create user
        $user = User::create($validated);
        
        // Assign role and link the user to the appropriate record
        if ($siswa) {
            $user->assignRole('siswa');
            $siswa->update(['user_id' => $user->id]);
        } else {
            $user->assignRole('siswa');
            $guru->update(['user_id' => $user->id]);
        }

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
