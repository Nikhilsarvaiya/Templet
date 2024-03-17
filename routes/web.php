<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\EventsController;
use App\Http\Controllers\Web\GalleriesController;
use App\Http\Controllers\Web\CmsPageController;
use App\Http\Controllers\Web\FaqController;
use App\Http\Controllers\Web\ContactUsController;
use App\Http\Controllers\Web\UserContactUsController;
use App\Http\Controllers\Web\ParkAssistsController;
use App\Http\Controllers\Web\ProgramsController;
use App\Http\Controllers\Web\PoojaBookingsController;
use App\Http\Controllers\Web\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->name('web.home');

// about-us
Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('web.aboutus');

Route::controller(HomeController::class)->group(function () {
    Route::get('teams', 'index')->name('web.teams');
    Route::get('load-more-teams', 'loadMoreTeamsMenu')->name('web.teams.load.more.teams');
});

// events
Route::controller(EventsController::class)->group(function () {
    Route::get('events', 'index')->name('web.events');
    Route::get('load-more-events', 'loadMoreEventsMenu')->name('web.events.load.more.events');
    Route::get('events/{slug}', 'detail')->name('web.events.detail');
});

// galleries
Route::controller(GalleriesController::class)->group(function () {
    Route::get('galleries', 'index')->name('web.galleries');
    Route::get('load-more-galleries', 'loadMoreGalleriesMenu')->name('web.galleries.load.more.galleries');
    Route::get('galleries/{slug}', 'detail')->name('web.galleries.detail');
});

// cms page
Route::get('cms/{slug}', [CmsPageController::class, 'cmsPage'])->name('web.cms.page');

// faq page
Route::get('faq', [FaqController::class, 'faqPagq'])->name('web.faq.faq.page');

// contact-us page
Route::get('contact-us', [ContactUsController::class, 'index'])->name('web.contect.us');

Route::post('user-contact-us',[UserContactUsController::class,'save'])->name('user.contact.us.save');


// parl-login
Route::controller(AuthController::class)->group(function () {

    Route::get('park-assist', 'index')->name('web.park.assist');
    Route::post('post-login', 'postLogin')->name('web.park.login.post'); 
    Route::get('registration', 'registration')->name('web.park.register');
    Route::post('post-registration', 'postRegistration')->name('web.park.register.post'); 
    // Route::get('dashboard', 'dashboard'); 
    Route::get('logout', 'logout')->name('web.park.logout');
});

// ParkAssistsController
Route::controller(ParkAssistsController::class)->group(function () {
    Route::post('post-add', 'save')->name('web.park.add.post')->middleware('auth'); 
    Route::get('search-vehicle', 'searchVehicle')->name('web.park.search.vehicle')->middleware('auth');
    Route::post('post-search', 'searchVehiclePost')->name('web.park.search.post')->middleware('auth'); 
    Route::get('update-vehicle', 'updateVehicle')->name('web.park.update.vehicle')->middleware('auth');
    Route::post('post-update', 'update')->name('web.park.update.post')->middleware('auth'); 
});

// Programs
Route::controller(ProgramsController::class)->group(function () {
    Route::get('programs', 'index')->name('web.programs');
    Route::get('load-more-programs', 'loadMoreProgramsMenu')->name('web.programs.load.more.programs');
    Route::get('programs/{slug}', 'detail')->name('web.programs.detail');

    Route::post('programs-filter', 'filter')->name('web.programs.filter');
});

// Pooja Bookings
Route::controller(PoojaBookingsController::class)->group(function () {
    Route::get('pooja-bookings', 'index')->name('web.pooja.bookings');
});
