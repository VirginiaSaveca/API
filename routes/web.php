<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Branch;
use App\Livewire\OrganicUnit;
use App\Livewire\Department;
use App\Livewire\Partition;
use App\Livewire\Career;
use App\Livewire\Category;

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


require __DIR__.'/auth.php';
