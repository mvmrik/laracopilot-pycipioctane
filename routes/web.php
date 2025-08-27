<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Main Website Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes (Protected by session check in controller)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // Additional admin routes (for future development)
    // Route::get('/users', [AdminController::class, 'users'])->name('users');
    // Route::get('/transactions', [AdminController::class, 'transactions'])->name('transactions');
    // Route::get('/analytics', [AdminController::class, 'analytics'])->name('analytics');
    // Route::get('/trading', [AdminController::class, 'trading'])->name('trading');
    // Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    // Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});