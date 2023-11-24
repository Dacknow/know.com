<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use PharIo\Manifest\Author;

Route::prefix('author')->name('author.')->group(function(){
    
    Route::middleware(['guest:web', 'PreventBackHistory'])->group(function(){
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
        Route::get('/password/reset/{token}', [AuthorController::class, 'resetPasswordToken'])->name('reset-password');
        Route::post('/reset-password-handler', [AuthorController::class, 'resetPasswordHandler'])->name('reset-password-handler');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::get('/home', [AuthorController::class, 'index'])->name('home');
        Route::post('/logout_handler',[AuthorController::class, 'logoutHandler'])->name('logout_handler');
        Route::get('/profile', [AuthorController::class, 'profileView'])->name('profile');
        Route::post('/change-profile-picture',[AuthorController::class, 'changeProfilePicture'])->name('change-profile-picture');
    });
});