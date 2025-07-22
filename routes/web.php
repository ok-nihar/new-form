<?php

use Illuminate\Support\Facades\Route;
use Niharb\MyForm\Http\Controllers\FormController;
use Niharb\MyForm\Http\Controllers\AuthController;

Route::group(['prefix' => 'my-form', 'as' => 'my-form.', 'middleware' => 'web'], function () {

    // New Registration Routes
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.create');
    Route::post('/register', [AuthController::class, 'register'])->name('register.store');

    // New Login Routes
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.create');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');

    // Hello Page (Protected by middleware)
    Route::middleware('auth:package_web')->group(function () {
        Route::get('/hello', [AuthController::class, 'hello'])->name('hello');
    });

    // Logout Route
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});