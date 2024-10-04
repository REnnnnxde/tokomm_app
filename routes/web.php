<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CompanyAboutController;
use App\Http\Controllers\CompanyStatisticController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\OurPrincipleController;
use App\Http\Controllers\OurTeamController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectClientController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        // Statistics
        Route::middleware('can:manage statistics')->group(function () {
            Route::resource('statistics', CompanyStatisticController::class);
        }); // Penutup untuk Statistik

        // Products
        Route::middleware('can:manage products')->group(function () {
            Route::resource('products', ProductController::class);
        }); // Penutup untuk Products

        // Principles
        Route::middleware('can:manage principles')->group(function () {
            Route::resource('principles', OurPrincipleController::class);
        }); // Penutup untuk Principles

        // Testimonials
        Route::middleware('can:manage testimonials')->group(function () {
            Route::resource('testimonials', TestimonialController::class);
        }); // Penutup untuk Testimonials

        // Clients
        Route::middleware('can:manage clients')->group(function () {
            Route::resource('clients', ProjectClientController::class);
        }); // Penutup untuk Clients

        // Teams
        Route::middleware('can:manage teams')->group(function () {
            Route::resource('teams', OurTeamController::class);
        }); // Penutup untuk Teams

        // About
        Route::middleware('can:manage abouts')->group(function () {
            Route::resource('abouts', CompanyAboutController::class);
        }); // Penutup untuk About

        // Appointments
        Route::middleware('can:manage appointments')->group(function () {
            Route::resource('appointments', AppointmentController::class);
        }); // Penutup untuk Appointments

        // Hero Sections
        Route::middleware('can:manage hero_sections')->group(function () { // Pastikan ini mencocokkan permission yang benar
            Route::resource('hero_sections', HeroSectionController::class);
        }); // Penutup untuk Hero Sections
    }); // Penutup grup admin

}); // Penutup grup auth

require __DIR__ . '/auth.php';
