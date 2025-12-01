<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    PlanController,
    ServiceController,
    SolutionController,
    IndustryController,
    PartnerController,
    ClientController,
    ProjectController,
    RoleController,
    UserController,
    TicketController,
    ContactMessageController,
    DashboardController,
    HomeController
};
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| Public Static + Dynamic Pages
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    $services = Service::query()
        ->where('is_active', true)
        ->orderBy('sort_order')
        ->limit(4)
        ->get();

    return view('pages.home', compact('services'));
})->name('home');

Route::view('/about', 'pages.about')->name('about');

// ✅ Contact page (GET) + form submission (POST)
Route::get('/contact', fn () => view('pages.contact'))->name('contact');
Route::post('/contact', [ContactMessageController::class, 'store'])->name('contact.store');

Route::view('/support', 'pages.support')->name('support');

/*
|--------------------------------------------------------------------------
| Public Catalog Routes
|--------------------------------------------------------------------------
| Only index + show are exposed for catalog browsing.
*/
Route::get('/services', [ServiceController::class, 'index'])->name('services.index'); // supports ?tab=slug
Route::get('/services/{service:slug}', [ServiceController::class, 'show'])->name('services.show');

Route::resource('solutions', SolutionController::class)->only(['index', 'show']);
Route::resource('industries', IndustryController::class)->only(['index', 'show']);
Route::resource('partners', PartnerController::class)->only(['index', 'show']);
Route::resource('projects', ProjectController::class)->only(['index', 'show']); // public-facing projects

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/
Auth::routes(['verify' => true]);

/*
|--------------------------------------------------------------------------
| Protected Resources (auth + verified)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Core business resources
    Route::resource('plans', PlanController::class);
    Route::resource('tickets', TicketController::class);

    // Admin-only contact message management
    Route::resource('contact-messages', ContactMessageController::class)->except(['store']);

    Route::resource('clients', ClientController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

    // Admin-only project management (create, store, edit, update, destroy)
    Route::resource('projects', ProjectController::class)->except(['index', 'show']);

    // Full resource routes for services (admin only)
    Route::resource('services', ServiceController::class)->except(['index', 'show']);
});

/*
|--------------------------------------------------------------------------
| Legacy Home Route
|--------------------------------------------------------------------------
*/
Route::get('/home', [HomeController::class, 'index'])->name('home.legacy');
