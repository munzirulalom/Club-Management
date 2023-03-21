<?php

use App\Http\Controllers\UserAuth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [UserAuth::class, "login"] )->name('/');

Route::get('/login', [UserAuth::class, "login"] )->name('login');
Route::post('/login', [UserAuth::class, "userLogin"] );

Route::get('/register', [UserAuth::class, "register"] )->name('register');
Route::post('/register', [UserAuth::class, "userRegistration"] );

Route::get('/forgot-password', [UserAuth::class, "forgotPage"] )->name('forgot-password');
Route::post('/forgot-password', [UserAuth::class, "forgotPassword"] );