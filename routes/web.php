<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Branch;
use App\Livewire\OrganicUnit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/branch', Branch\Index::class)->name('branch');
Route::get('/organic_unit', OrganicUnit\Index::class)->name('oragnic_unit');

require __DIR__.'/auth.php';
