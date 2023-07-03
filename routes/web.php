<?php

use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

Route::post('login-check', [UserController::class,'login']);
Route::post('register-save',[UserController::class, 'register']);
Route::get('/logout',[UserController::class,'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('dashboard');
    });
});
