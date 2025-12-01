<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\CompaniesTable;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Companies
    Volt::route('companies', CompaniesTable::class)
        ->name('companies.index')
        ->middleware('can:viewAny,App\Models\Company');

    Volt::route('companies/{company}', 'companies.show')
        ->name('company.show')
        ->middleware('can:view,company');

    // Projects
    Volt::route('projects', 'projects.index')
        ->name('projects.index')
        ->middleware('can:viewAny,App\Models\Project');

    Volt::route('projects/{project}', 'projects.show')
        ->name('projects.show')
        ->middleware('can:view,project');

    // Tasks
    Volt::route('tasks/{task}', 'tasks.show')
        ->name('tasks.show')
        ->middleware('can:view,task');

    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
