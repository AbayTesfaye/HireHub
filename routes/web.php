<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seeker-registery',[UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('/seeker-registery',[UserController::class, 'storeSeeker'])->name('store.seeker');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'postLogin'])->name('postLogin');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
