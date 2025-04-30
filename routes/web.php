<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Auth::routes(['verify' => true, 'register' => false]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {

});
