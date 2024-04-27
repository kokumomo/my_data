<?php

use App\Http\Controllers\Actor\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Actor\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Actor\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Actor\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Actor\Auth\NewPasswordController;
use App\Http\Controllers\Actor\Auth\PasswordResetLinkController;
use App\Http\Controllers\Actor\Auth\RegisteredUserController;
use App\Http\Controllers\Actor\Auth\VerifyEmailController;
use App\Http\Controllers\Actor\CoffeeController;
use App\Http\Controllers\Actor\SnapController;
use App\Http\Controllers\Actor\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('actor.welcome');
});

Route::prefix('coffees')->
    middleware('auth:actors')->group(function(){
        Route::get('index', [CoffeeController::class, 'index'])->name('coffees.index');
        Route::get('edit/{coffee}', [CoffeeController::class, 'edit'])->name('coffees.edit');
        Route::post('update/{coffee}', [CoffeeController::class, 'update'])->name('coffees.update');
});

Route::resource('snaps', SnapController::class)
->middleware('auth:actors')->except(['show']);

Route::resource('products', ProductController::class)
->middleware('auth:actors')->except(['show']);

Route::get('/dashboard', function () {
    return view('actor.dashboard');
})->middleware(['auth:actors'])->name('dashboard');



Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth:actors')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});