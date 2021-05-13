<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Auth')->group(function() {
    Route::post('/register', 'RegisteredUserController@store')
         ->middleware('guest');

    Route::post('/login', 'AuthenticatedSessionController@store')
         ->middleware('guest');

    Route::post('/forgot-password', 'PasswordResetLinkController@store')
         ->middleware('guest')
         ->name('password.email');

    Route::post('/reset-password', 'NewPasswordController@store')
         ->middleware('guest')
         ->name('password.update');

    Route::get('/verify-email/{id}/{hash}', 'VerifyEmailController@__invoke')
         ->middleware(['auth', 'signed', 'throttle:6,1'])
         ->name('verification.verify');

    Route::post('/email/verification-notification', 'EmailVerificationNotificationController@store')
         ->middleware(['auth', 'throttle:6,1'])
         ->name('verification.send');

    Route::post('/confirm-password', 'ConfirmablePasswordController@store')
         ->middleware('auth');

    Route::post('/logout', 'AuthenticatedSessionController@destroy')
         ->middleware('auth')
         ->name('logout');
});

Route::prefix('teacher')->namespace('App\Http\Controllers\Auth\Teacher')->group(function(){
    Route::post('/register', 'RegisteredUserController@store')
         ->middleware('guest:teacher');

    Route::post('/login', 'AuthenticatedSessionController@store')
         ->middleware('guest:teacher');

    Route::post('/forgot-password', 'PasswordResetLinkController@store')
         ->middleware('guest:teacher')
         ->name('teacher.password.email');

    Route::post('/reset-password', 'NewPasswordController@store')
         ->middleware('guest:teacher')
         ->name('teacher.password.update');

    Route::get('/verify-email/{id}/{hash}', 'VerifyEmailController@__invoke')
         ->middleware(['auth', 'signed', 'throttle:6,1'])
         ->name('teacher.verification.verify');

    Route::post('/email/verification-notification', 'EmailVerificationNotificationController@store')
         ->middleware(['auth', 'throttle:6,1'])
         ->name('teacher.verification.send');

    Route::post('/confirm-password', 'ConfirmablePasswordController@store')
         ->middleware('auth');

    Route::post('/logout', 'AuthenticatedSessionController@destroy')
         ->middleware('auth')
         ->name('teacher.logout');
});
