<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Branch;
use App\Livewire\OrganicUnit;
use App\Livewire\Department;
use App\Livewire\Partition;
use App\Livewire\Career;
use App\Livewire\Category;
use App\Livewire\Level;
use App\Livewire\Position;
use App\Livewire\SalaryLevel;
use App\Livewire\Employee;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
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


require __DIR__.'/auth.php';
