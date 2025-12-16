<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Livewire\Companies\Index as CompaniesIndex;
use App\Livewire\Companies\Create as CompaniesCreate;
use App\Livewire\Companies\Show as CompaniesShow;
use App\Livewire\Companies\Edit as CompaniesEdit;

use App\Livewire\Projects\Index as ProjectsIndex;
use App\Livewire\Projects\Create as ProjectsCreate;
use App\Livewire\Projects\Show as ProjectsShow;
use App\Livewire\Projects\Edit as ProjectsEdit;

use App\Livewire\Tasks\Index as TasksIndex;
use App\Livewire\Tasks\Create as TasksCreate;
use App\Livewire\Tasks\Show as TasksShow;
use App\Livewire\Tasks\Edit as TasksEdit;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    // Companies
    Route::prefix('companies')->group(function(){
        Volt::route('/', CompaniesIndex::class)->name('companies.index')->middleware('can:viewAny,App\Models\Company');
        Volt::route('/create', CompaniesCreate::class)->name('companies.create')->middleware('can:create,App\Models\Company');
        Volt::route('/{company}', CompaniesShow::class)->name('companies.show');
        Volt::route('/{company}/edit', CompaniesEdit::class)->name('companies.edit');
    });

    // Projects
    Route::prefix('projects')->group(function(){
        Volt::route('/', ProjectsIndex::class)->name('projects.index')->middleware('can:viewAny,App\Models\Project');
        Volt::route('/create', ProjectsCreate::class)->name('projects.create')->middleware('can:create,App\Models\Project');
        Volt::route('/{project}', ProjectsShow::class)->name('projects.show');
        Volt::route('/{project}/edit', ProjectsEdit::class)->name('projects.edit');
    });


    // Tasks
    Route::prefix('tasks')->group(function(){
        Volt::route('/', TasksIndex::class)->name('tasks.index')->middleware('can:viewAny,App\Models\Task');
        Volt::route('/create', TasksCreate::class)->name('tasks.create')->middleware('can:create,App\Models\Task');
        Volt::route('/{task}', TasksShow::class)->name('tasks.show');
        Volt::route('/{task}/edit', TasksEdit::class)->name('tasks.edit');
    });


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
