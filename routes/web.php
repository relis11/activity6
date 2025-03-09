<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SocialAuthController;

// Login & Register Views
Route::view('/login', 'login')->name('login.page');
Route::view('/register', 'register')->name('register.page');

// AJAX Authentication Routes
Route::post('/ajax-login', [AuthController::class, 'login'])->name('ajax.login');
Route::post('/ajax-register', [AuthController::class, 'register'])->name('ajax.register');
Route::post('/ajax-logout', [AuthController::class, 'logout'])->name('ajax.logout');

// Social Authentication Routes
Route::get('/auth/{provider}/redirect', [SocialAuthController::class, 'redirect'])->name('social.redirect');
Route::get('/auth/{provider}/callback', [SocialAuthController::class, 'callback']);

// Protected Dashboard
Route::middleware('auth')->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
