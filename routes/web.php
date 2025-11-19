<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');
Route::view('/services', 'pages.services')->name('services');
Route::view('/solutions', 'pages.solutions')->name('solutions');
Route::view('/industries', 'pages.industries')->name('industries');
Route::view('/partners', 'pages.partners')->name('partners');
Route::view('/support', 'pages.support')->name('support');
Route::view('/contact', 'pages.contact')->name('contact');

// New routes
Route::view('/dashboard', 'pages.dashboard')->name('dashboard');
Route::view('/plans', 'pages.plans')->name('plans');
