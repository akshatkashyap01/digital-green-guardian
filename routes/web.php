<?php

use App\Http\Controllers\ActivityUploadController;
use App\Http\Controllers\ActivityVerificationController;
use App\Http\Controllers\ComplaintController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Auth::routes(['verify' => true, 'register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    // Route::resource('my-activity', ActivityController::class);
    Route::resource('my-activity', ActivityUploadController
    ::class);
    Route::resource('complaints', ComplaintController
    ::class);
    Route::post('/complaints/{id}/approve', [ComplaintController::class, 'approve'])->name('complaints.approve');
    Route::resource('verify-activity', ActivityVerificationController
    ::class);
    Route::post('/verify-activity/{id}/status-update', [ActivityUploadController::class, 'statusUpdate'])->name('verificationstatus.update');
});
