<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\AdministrativeAct;
use App\Livewire\Branch;
use App\Livewire\Career;
use App\Livewire\Category;
use App\Livewire\Department;
use App\Livewire\Employee;
use App\Livewire\Level;
use App\Livewire\OrganicUnit;
use App\Livewire\Partition;
use App\Livewire\Position;
use App\Livewire\Qualification;
use App\Livewire\SalaryLevel;
use App\Livewire\Transfers;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('/docs', 'scribe.index')->name('scribe');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', LogoutController::class)->name('logout');

    Route::view('dashboard', 'dashboard')
        ->name('dashboard');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::get('/branch', Branch\Index::class)->name('branch');
    Route::get('/organic_unit', OrganicUnit\Index::class)->name('oragnic_unit');
    Route::get('/department', Department\Index::class)->name('department');
    Route::get('/partition', Partition\Index::class)->name('partition');
    Route::get('/career', Career\Index::class)->name('career');
    Route::get('/category', Category\Index::class)->name('category');
    Route::get('/level', Level\Index::class)->name('level');
    Route::get('/position', Position\Index::class)->name('position');
    Route::get('/salarylevel', SalaryLevel\Index::class)->name('salarylevel');
    Route::get('/employee', Employee\Index::class)->name('employee');
    Route::get('/qualification', Qualification\Index::class)->name('qualification');
    Route::get('/transfer', Transfers\Index::class)->name('transfer');
    Route::get('/adminacts', AdministrativeAct\Index::class)->name('adminacts');
});

require __DIR__.'/auth.php';
