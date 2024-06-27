<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/submit', [HomeController::class, 'store'])->name('kirim');

Route::get('/reload-captcha', [HomeController::class, 'reloadCaptcha']);
