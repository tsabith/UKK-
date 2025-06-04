<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Siswa;
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
        // Check if email exists in siswa table
        $siswa = Siswa::where('email', $this->email)->first();
        
        if (!$siswa) {
            throw ValidationException::withMessages([
                'email' => __('Email tidak terdaftar di database siswa. Silahkan hubungi administrator.'),
            ]);
        }

        // Check if this student already has a user account
        if ($siswa->user_id !== null) {
            throw ValidationException::withMessages([
                'email' => __('Akun untuk siswa ini sudah terdaftar sebelumnya.'),
            ]);
        }

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        // Create user with student role
        $user = User::create($validated);
        $user->assignRole('siswa');

        // Link the user to the student record
        $siswa->update(['user_id' => $user->id]);

        event(new Registered($user));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}
