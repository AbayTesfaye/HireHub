<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seeker-registery',[UserController::class, 'createSeeker'])->name('createSeeker');
Route::post('/seeker-registery',[UserController::class, 'storeSeeker'])->name('storeSeeker');
