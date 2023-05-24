<?php

use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Models\Apartment;
use App\Models\Message;
use Illuminate\Support\Facades\Route;


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

// # Guest route
Route::get('/',    [GuestHomeController::class,    'homepage'])->name('homepage');

// # Apartment route
// Route::resource('apartments', ApartmentController::class);


// # Protected routes
Route::middleware('auth')
    ->prefix('admin')   // * routes url start with "/admin." 
    ->name('admin.')    // * routes name start with "admin." 
    ->group(
        function () {
            Route::get('/dashboard',   [AdminHomeController::class,    'dashboard'])->name('dashboard');

            // # Apartment route
            Route::get('/apartments', [ApartmentController::class, 'index'])->name('apartments.index');
            Route::get('/apartments/create', [ApartmentController::class, 'create'])->name('apartments.create');
            Route::post('/apartments/create', [ApartmentController::class, 'store'])->name('apartments.store');
            Route::resource('apartments', ApartmentController::class)->middleware('can:update,apartment')->except(['index', 'create', 'store']);
            // # Messages route
            Route::resource('messages', MessagesController::class)->only(['index', 'show']);

            // # route chart
            Route::get('chart', [ChartController::class, 'index']); //

            // Sponsor route
            Route::get('/apartments/{apartment}/sponsorship', [SponsorController::class, 'showSponsorshipForm'])->name('apartments.sponsorship');
            Route::post('/apartments/{apartment}/sponsorship', [SponsorController::class, 'processSponsorship'])->name('apartments.sponsorship.process');
        }

    );

// ! Generated routes, do not touch
// # Protected profile's routes
Route::middleware('auth')
    ->prefix('profile')      // * routes url start with "/profile." 
    ->name('profile.')       // * routes name start with "profile." 
    ->group(
        function () {
            Route::get('/', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/', [ProfileController::class, 'update'])->name('update');
            Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
        }
    );

require __DIR__ . '/auth.php';