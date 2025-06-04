<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Livewire\Siswa\View;
use App\Livewire\Siswa\Form;
use App\Livewire\Pkl\Form as PKLForm;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// here
Route::view('siswa', 'siswa')
    ->middleware(['auth', 'verified'])
    ->name('siswa');
Route::middleware(['auth'])->group(function () {
    // Routes yang lain
    Route::get('/siswa/show/{id}', View::class)->name('siswa.show');
    Route::get('/siswa/create', Form::class)->name('siswa.create');
    Route::get('/siswa/edit/{id}', Form::class)->name('siswa.edit');

    // Routes yang lain
});

Route::view('guru', 'guru')
    ->middleware(['auth', 'verified'])
    ->name('guru');

Route::view('industri', 'industri')
    ->middleware(['auth', 'verified'])
    ->name('industri');

Route::view('pkl', 'pkl')
    ->middleware(['auth', 'verified'])
    ->name('pkl');
    
Route::middleware(['auth'])->group(function () {
    // Routes yang lain
    Route::get('/pkl/create', PKLForm::class)->name('pkl.create');
    Route::get('/pkl/edit/{id}', PKLForm::class)->name('pkl.edit');

});


require __DIR__.'/auth.php';
