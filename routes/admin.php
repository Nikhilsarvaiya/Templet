<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventsController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\GalleriesController;
use App\Http\Controllers\Admin\CmsPageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\UserContactUsController;
use App\Http\Controllers\Admin\TeamsController;
use App\Http\Controllers\Admin\ParkUserController;
use App\Http\Controllers\Admin\ParkAssistsController;
use App\Http\Controllers\Admin\ProgramsDetailsController;
use App\Http\Controllers\Admin\ProgramsController;
use App\Http\Controllers\Admin\PoojaMastersController;
use App\Http\Controllers\Admin\PanditjiAvailabilitiesController;
use App\Http\Controllers\Admin\PoojaCreationsController;
use App\Http\Controllers\Admin\CustomerPoojaBookingsController;
use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Admin\Auth\AdminForgotPasswordController;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cache-clear',function(){
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    // Artisan::call('permission:cache-reset');
    return back()->with('success', 'cache clear');
});

// table migrate
Route::get('/migrate',function(){
    Artisan::call('migrate');
    return back()->with('success', 'migration successfully.');
});

// DB seed
Route::get('/db-seed',function(){
    Artisan::call('db:seed');
    return back()->with('success', 'Seeding database');
});

Route::get('/st-link', function () {
    Artisan::call('storage:link');
    return back()->with('success', 'Storage link generate successfully');
});

Route::get('/phpinfo',function(){
    phpinfo();
});

Route::controller(AdminLoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('admin.login.form');
    Route::post('login', 'login')->name('admin.login.post');
    Route::post('logout', 'logout')->name('admin.logout');
});

// forgot password
Route::post('send-mail', [AdminForgotPasswordController::class, 'forgetPassword'])->middleware('guest')->name('admin.sendForgetPasswordLink');
Route::get('reset-password/{token}', [AdminForgotPasswordController::class, 'ResetPasswordForm'])->middleware('guest')->name('password.reset');
Route::post('reset-password/{token}', [AdminForgotPasswordController::class, 'resetPasswordStore'])->middleware('guest')->name('admin.password.reset');


// protected admin routes
Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

    // Editor image upload
    Route::post('image-upload', [AdminHomeController::class, 'storeImage'])->name('admin.image.upload');

    // Admin update profile
    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('profile', 'profileEdit')->name('admin.profile.edit');
        Route::post('update-profile', 'profileUpdate')->name('admin.profile.update');
    });

    // Home Slider
    Route::group(['prefix' => 'home-slider'], function(){
        Route::controller(HomeSliderController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.home.slider.list');
            Route::get('add', 'add')->name('admin.home.slider.add');
            Route::get('edit/{id}', 'add')->name('admin.home.slider.edit');
            Route::post('store', 'store')->name('admin.home.slider.store');
            Route::post('update', 'store')->name('admin.home.slider.update');
            Route::post('delete', 'delete')->name('admin.home.slider.delete');
        });
    });

    // Category
    Route::group(['prefix' => 'category'], function(){
        Route::controller(CategoryController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.category.list');
            Route::get('add', 'add')->name('admin.category.add');
            Route::get('edit/{id}', 'add')->name('admin.category.edit');
            Route::post('store', 'store')->name('admin.category.store');
            Route::post('update', 'store')->name('admin.category.update');
            Route::post('delete', 'delete')->name('admin.category.delete');
        });
    });

    // Events
    Route::group(['prefix' => 'events'], function(){
        Route::controller(EventsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.events.list');
            Route::get('add', 'add')->name('admin.events.add');
            Route::get('edit/{id}', 'add')->name('admin.events.edit');
            Route::post('store', 'store')->name('admin.events.store');
            Route::post('update', 'store')->name('admin.events.update');
            Route::post('delete', 'delete')->name('admin.events.delete');
        });
    });

    // Teams
    Route::group(['prefix' => 'teams'], function(){
        Route::controller(TeamsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.teams.list');
            Route::get('add', 'add')->name('admin.teams.add');
            Route::get('edit/{id}', 'add')->name('admin.teams.edit');
            Route::post('store', 'store')->name('admin.teams.store');
            Route::post('update', 'store')->name('admin.teams.update');
            Route::post('delete', 'delete')->name('admin.teams.delete');
        });
    });

    // park users
    Route::group(['prefix' => 'parkusers'], function(){
        Route::controller(ParkUserController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.parkusers.list');
            Route::get('add', 'add')->name('admin.parkusers.add');
            Route::get('edit/{id}', 'add')->name('admin.parkusers.edit');
            Route::post('store', 'store')->name('admin.parkusers.store');
            Route::post('update', 'store')->name('admin.parkusers.update');
            Route::post('delete', 'delete')->name('admin.parkusers.delete');
        });
    });

    // park assists
    Route::group(['prefix' => 'parkassists'], function(){
        Route::controller(ParkAssistsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.parkassists.list');
            Route::get('add', 'add')->name('admin.parkassists.add');
            Route::get('edit/{id}', 'add')->name('admin.parkassists.edit');
            Route::post('store', 'store')->name('admin.parkassists.store');
            Route::post('update', 'store')->name('admin.parkassists.update');
            Route::post('delete', 'delete')->name('admin.parkassists.delete');
        });
    });

    // Galleries
    Route::group(['prefix' => 'galleries'], function(){
        Route::controller(GalleriesController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.galleries.list');
            Route::get('add', 'add')->name('admin.galleries.add');
            Route::get('edit/{id}', 'add')->name('admin.galleries.edit');
            Route::post('store', 'store')->name('admin.galleries.store');
            Route::post('update', 'store')->name('admin.galleries.update');
            Route::post('delete', 'delete')->name('admin.galleries.delete');
        });
    });

    // cms_pages
    Route::group(['prefix' => 'cms-page'], function(){
        Route::controller(CmsPageController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.cms.page.list');
            Route::get('add', 'add')->name('admin.cms.page.add');
            Route::get('edit/{id}', 'add')->name('admin.cms.page.edit');
            Route::post('store', 'store')->name('admin.cms.page.store');
            Route::post('delete', 'delete')->name('admin.cms.page.delete');
        });
    });

    // user contact-us pages
    Route::group(['prefix' => 'user-contact-us'], function(){
        Route::controller(UserContactUsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.user.contact.us.list');
            Route::get('edit/{id}', 'view')->name('admin.user.contact.us.view');
            Route::post('delete', 'delete')->name('admin.user.contact.us.delete');
        });
    });

    // AboutUsController
    Route::group(['prefix' => 'about-us'], function(){
        Route::controller(AboutUsController::class)->group(function () {
            Route::get('add', 'add')->name('admin.about.us.add');
            Route::post('store', 'store')->name('admin.about.us.store');
        });
    });

    // faqs
    Route::group(['prefix' => 'faq'], function(){
        Route::controller(FaqController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.faq.list');
            Route::get('add', 'add')->name('admin.faq.add');
            Route::get('edit/{id}', 'add')->name('admin.faq.edit');
            Route::post('store', 'store')->name('admin.faq.store');
            Route::post('update', 'store')->name('admin.faq.update');
            Route::post('delete', 'delete')->name('admin.faq.delete');
        });
    });

    // pooja masters
    Route::group(['prefix' => 'pooja-masters'], function(){
        Route::controller(PoojaMastersController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.pooja.masters.list');
            Route::get('add', 'add')->name('admin.pooja.masters.add');
            Route::get('edit/{id}', 'add')->name('admin.pooja.masters.edit');
            Route::post('store', 'store')->name('admin.pooja.masters.store');
            Route::post('update', 'store')->name('admin.pooja.masters.update');
            Route::post('delete', 'delete')->name('admin.pooja.masters.delete');
        });
    });

    // panditji availabilities
    Route::group(['prefix' => 'panditji-availabilities'], function(){
        Route::controller(PanditjiAvailabilitiesController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.panditji.availabilities.list');
            Route::get('add', 'add')->name('admin.panditji.availabilities.add');
            Route::get('edit/{id}', 'edit')->name('admin.panditji.availabilities.edit');
            Route::post('store', 'store')->name('admin.panditji.availabilities.store');
            Route::post('update', 'update')->name('admin.panditji.availabilities.update');
            Route::post('delete', 'delete')->name('admin.panditji.availabilities.delete');
        });
    });

    // pooja masters
    Route::group(['prefix' => 'pooja-creations'], function(){
        Route::controller(PoojaCreationsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.pooja.creations.list');
            Route::get('add', 'add')->name('admin.pooja.creations.add');
            Route::get('edit/{id}', 'edit')->name('admin.pooja.creations.edit');
            Route::post('store', 'store')->name('admin.pooja.creations.store');
            Route::post('update', 'update')->name('admin.pooja.creations.update');
            Route::post('delete', 'delete')->name('admin.pooja.creations.delete');
            Route::get('pooja_data', 'poojaData')->name('admin.pooja.get.data');
            Route::get('panditji_data', 'panditjiData')->name('admin.pooja.get.panditji.data');
            Route::get('pooja_date', 'poojaDate')->name('admin.pooja.get.pooja.date');
        });
    });

    // customer-pooja-bookings
    Route::group(['prefix' => 'customer-pooja-bookings'], function(){
        Route::controller(CustomerPoojaBookingsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.customer.pooja.bookings.list');
            Route::get('add', 'add')->name('admin.customer.pooja.bookings.add');
            Route::get('edit/{id}', 'add')->name('admin.customer.pooja.bookings.edit');
            Route::post('store', 'store')->name('admin.customer.pooja.bookings.store');
            Route::post('delete', 'delete')->name('admin.customer.pooja.bookings.delete');
            Route::get('pooja_date_slot', 'poojaDateSlot')->name('admin.customer.pooja.bookings.get.date');
            Route::get('pooja_date_slot_edit', 'poojaDateSlotEdit')->name('admin.customer.pooja.bookings.get.date.edit');
        });
    });

    // contact-us
    Route::group(['prefix' => 'contact-us'], function(){
        Route::controller(ContactUsController::class)->group(function () {
            Route::get('add', 'add')->name('admin.contact.us.add');
            Route::post('store', 'store')->name('admin.contact.us.store');
        });
    });

    // programs-details
    Route::group(['prefix' => 'programs-details'], function(){
        Route::controller(ProgramsDetailsController::class)->group(function () {
            Route::get('add', 'add')->name('admin.programs.details.add');
            Route::post('store', 'store')->name('admin.programs.details.store');
        });
    });

    // Programs
    Route::group(['prefix' => 'programs'], function(){
        Route::controller(ProgramsController::class)->group(function () {
            Route::match(['get','post'],'list', 'list')->name('admin.programs.list');
            Route::get('add', 'add')->name('admin.programs.add');
            Route::get('edit/{id}', 'add')->name('admin.programs.edit');
            Route::post('store', 'store')->name('admin.programs.store');
            Route::post('update', 'store')->name('admin.programs.update');
            Route::post('delete', 'delete')->name('admin.programs.delete');
        });
    });

    /** Roles */
    Route::resource('roles', RoleController::class);

    Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);
});
