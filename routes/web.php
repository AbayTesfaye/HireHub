<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostJobController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthCheck;
use App\Http\Middleware\DonotAllowUserToMakePayment;
use App\Http\Middleware\isEmployer;
use App\Http\Middleware\isPremiumUser;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/seeker-registery',[UserController::class, 'createSeeker'])->name('create.seeker')->middleware(AuthCheck::class);
Route::post('/seeker-registery',[UserController::class, 'storeSeeker'])->name('store.seeker');

Route::get('/employer-registery',[UserController::class, 'createEmployer'])->name('create.employer')->middleware(AuthCheck::class);
Route::post('/employer-registery',[UserController::class, 'storeEmployer'])->name('store.employer');

Route::get('/login',[UserController::class,'login'])->name('login')->middleware(AuthCheck::class);
Route::post('/login',[UserController::class,'postLogin'])->name('postLogin');
Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('user/profile',[UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('user/profile',[UserController::class, 'update'])->name('user.update.profile')->middleware('auth');

Route::get('user/profile/seeker',[UserController::class, 'seekerProfile'])->name('seeker.profile')->middleware('auth');

Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware(['auth','verified',isPremiumUser::class]);
Route::get('/verify',[DashboardController::class, 'verify'])->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');



Route::get('/resend/verification/email',[DashboardController::class, 'resend'])->name('resend.email');


Route::get('/subscribe',[SubscriptionController::class, 'subscribe'])->name('subscribe')->middleware(['auth',isEmployer::class,DonotAllowUserToMakePayment::class]);

Route::get('/pay/weekly',[SubscriptionController::class, 'initiatePayement'])->name('pay.weekly')->middleware(['auth',isEmployer::class,DonotAllowUserToMakePayment::class]);
Route::get('pay/monthly',[SubscriptionController::class, 'initiatePayement'])->name('pay.monthly')->middleware(['auth',isEmployer::class,DonotAllowUserToMakePayment::class]);
Route::get('pay/yearly',[SubscriptionController::class, 'initiatePayement'])->name('pay.yearly')->middleware(['auth',isEmployer::class,DonotAllowUserToMakePayment::class]);


Route::get('payment/sucess',[SubscriptionController::class, 'paymentSuccess'])->name('payment.success');
Route::get('payment/cancel',[SubscriptionController::class, 'cancel'])->name('payment.cancel');

Route::get('job/create', [PostJobController::class, 'create'])->name('job.create')->middleware(isPremiumUser::class);
Route::post('job/store', [PostJobController::class, 'store'])->name('job.store')->middleware(isPremiumUser::class);
Route::get('job/{listing}/edit', [PostJobController::class, 'edit'])->name('job.edit');
Route::put('job/{id}/update', [PostJobController::class, 'update'])->name('job.update');
Route::get('job', [PostJobController::class, 'index'])->name('job.index');
Route::delete('job/{id}/delete', [PostJobController::class, 'delete'])->name('job.delete');
