<?php

use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'account'], function () {

    // Guest Routes
    Route::middleware('guest:web')->group(function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login');
        Route::get('register', [LoginController::class, 'register'])->name('account.register');
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister');
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate');
    });

    // Authenticated User Routes
    Route::middleware('auth:web')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard');
        Route::get('edit', [DashboardController::class, 'edit'])->name('account.edit');
        Route::post('update', [DashboardController::class, 'update'])->name('account.update');

        Route::post('delete', [DashboardController::class, 'delete'])->name('account.delete');
        Route::post('logout', [LoginController::class, 'logout'])->name('account.logout');
    });
});



Route::prefix('admin')->group(function () {

    // Admin Guest
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login');
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate');
    });

    // Admin Authenticated
    Route::middleware('admin.auth')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('users/edit/{id}', [AdminDashboardController::class, 'edit']);
        Route::post('users/update/{id}', [AdminDashboardController::class, 'update']);
        Route::post('users/delete/{id}', [AdminDashboardController::class, 'delete']);
        Route::post('logout', [AdminLoginController::class, 'logout'])->name('admin.logout');
    });
});
