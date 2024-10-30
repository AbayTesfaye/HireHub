<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/seeker-registery',[UserController::class, 'createSeeker'])->name('create.seeker');
Route::post('/seeker-registery',[UserController::class, 'storeSeeker'])->name('store.seeker');

Route::get('/employer-registery',[UserController::class, 'createEmployer'])->name('create.employer');
Route::post('/employer-registery',[UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'postLogin'])->name('postLogin');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth','verified');


Route::get('/verify',[DashboardController::class, 'verify'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('/resend/verification/email',[DashboardController::class, 'resend'])->name('resend.email');


Route::get('/subscribe',[SubscriptionController::class, 'subscribe'])->middleware('auth');

Route::get('pay/weekly',[SubscriptionController::class, 'initiatePayement'])->name('pay.weekly')->middleware('auth');
Route::get('pay/monthly',[SubscriptionController::class, 'initiatePayement'])->name('pay.monthly')->middleware('auth');
Route::get('pay/yearly',[SubscriptionController::class, 'initiatePayement'])->name('pay.yearly')->middleware('auth');
