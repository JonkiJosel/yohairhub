<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\AccessControlPage;
use App\Livewire\UserManagement;

use App\Livewire\Bookings\Show as ShowBookings;
use App\Livewire\salon\Show as ShowSalon;
use App\Livewire\salon\MySingleSalon as ShowSalonSingle;
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

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/access_control', AccessControlPage::class)->name('access_control');
    Route::get('/users', UserManagement::class)->name('users');

    Route::get('/salon', ShowSalon::class)->name('salon.show');
    Route::get('/bookings', ShowBookings::class)->name('bookings.show');
    Route::get('/salon/{salon}', ShowSalonSingle::class)->name('salon.show.single');
});
