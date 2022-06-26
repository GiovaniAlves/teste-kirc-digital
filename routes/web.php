<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [UsersController::class, 'index'])->name('dashboard');
    Route::resource('/users', UsersController::class);
    Route::post('/users/update-status/{id}', [UsersController::class, 'updateStatus'])->name('users.update.status');
    Route::post('/users/update-payment/{id}', [UsersController::class, 'updatePayment'])->name('users.update.payment');
});
