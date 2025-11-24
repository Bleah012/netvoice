<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\DashboardController; 

// Public static pages
Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::get('/contact', fn() => view('pages.contact'))->name('contact');
Route::view('/support', 'pages.support')->name('support');

// Catalog routes (public resource controllers)
Route::resource('plans', PlanController::class)->only(['index','show']);
Route::resource('services', ServiceController::class)->only(['index','show']);
Route::resource('solutions', SolutionController::class)->only(['index','show']);
Route::resource('industries', IndustryController::class)->only(['index','show']);
Route::resource('partners', PartnerController::class)->only(['index','show']);

// Support + contact
Route::resource('tickets', TicketController::class); 
Route::resource('contact-messages', ContactMessageController::class)->only(['store']);

// Dashboard (now dynamic via controller)
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Admin-only resources (wrap in middleware once auth is ready)
Route::middleware(['auth','admin'])->group(function () {
    Route::resource('clients', ClientController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
