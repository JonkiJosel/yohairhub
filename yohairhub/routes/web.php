<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;
use App\Livewire\AccessControlPage;
use App\Livewire\UserManagement;

use App\Livewire\Bookings\Show as ShowBookings;
use App\Livewire\Salon\AdminHairStyleGallery;
use App\Livewire\Salon\BookinsManagerView;
use App\Livewire\Salon\ListAllSalons;
use App\Livewire\Salon\ManageHairstyles;
use App\Livewire\Salon\Show as ShowSalon;
use App\Livewire\Salon\MySingleSalon as ShowSalonSingle;
use App\Livewire\Salon\ViewSingleProfile;

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

Route::get('/', [WebsiteController::class, 'welcome'])->name('welcome');

Route::get('/salons', [WebsiteController::class, 'salons'])->name('website.salons');
Route::get('/salons/{uuid}', [WebsiteController::class, 'viewSalon'])->name('website.salon.view');
Route::post('/salons/{uuid}/comments', [WebsiteController::class, 'postComment'])->name('website.salon.newComment');
Route::get('/contact-us', [WebsiteController::class, 'contactUs'])->name('website.contact-us');
Route::get('/about-us', [WebsiteController::class, 'aboutUs'])->name('website.about-us');
Route::get('/hairstyles', [WebsiteController::class, 'hairstyles'])->name('website.hairstyles');
Route::get('/hairstyle/{uuid}', [WebsiteController::class, 'hairstyleSingle'])->name('website.hairstyles.single');

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
    Route::get('/all-salons', ListAllSalons::class)->name('all_salons');
    Route::get('/all-hairstyles', AdminHairStyleGallery::class)->name('admin.hairstyles');
    Route::get('/bookings', ShowBookings::class)->name('bookings.show');
    Route::get('/salon/{salon}', ShowSalonSingle::class)->name('salon.show.single');
    Route::get('/salon/{salon}/profile', ViewSingleProfile::class)->name('salon.show.single.profile');
    Route::get('/salon/{salon}/bookings-manager', BookinsManagerView::class)->name('salon.show.single.bookings_manager');
    Route::get('/salon/{salon}/hairstyle-manager', ManageHairstyles::class)->name('salon.show.single.hairstyle_manager');
});
