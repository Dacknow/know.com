<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use League\Flysystem\PathPrefixer;
use League\Flysystem\UrlGeneration\PrefixPublicUrlGenerator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->name('auth.')->group(function(){
    
    Route::middleware((['guest:web']))->group(function(){
        Route::view('/login', 'back.pages.auth.login')->name('login');
        Route::view('/forgot-password','back.pages.auth.forgot')->name('forgot-password');
    });

    Route::middleware([])->group(function(){
        Route::get('/home', [AuthController::class, 'index'])->name('home');
    });
});
