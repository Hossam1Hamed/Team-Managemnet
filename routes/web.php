<?php

use App\Http\Controllers\Dashboard\Roles;
use App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Web\HomepageController;
use App\Http\Controllers\Web\ProfileController;
use App\Http\Controllers\Website\MessageController;
use Illuminate\Support\Facades\Route;

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


Auth::routes();



Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/up', [App\Http\Controllers\HomeController::class, 'test'])->name('test');

    Route::resource('users', User::class);
    // Route::get('/users/test', [User::class,'test']);

    Route::resource('roles', Roles::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomepageController::class , 'index'])->name('website.home');
    Route::get('/website', [HomepageController::class , 'index'])->name('website.home');
    Route::resource('/profile',ProfileController::class);
    Route::resource('message',MessageController::class);
});