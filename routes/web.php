<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\WebsiteController;
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

Route::get('/', [WebsiteController::class, 'index']);
Route::get('/single-blog/{id}', [WebsiteController::class, 'show']);


Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

Route::post('login-check', [UserController::class,'login']);
Route::post('register-save',[UserController::class, 'register']);
Route::get('/logout',[UserController::class,'logout']);

Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::controller(BlogsController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/blogs', 'index');
        Route::get('/blogs/create', 'create');
        Route::post('/blogs/store', 'store');
        Route::get('/blogs/{id}', 'show');
        Route::get('/blogs/{id}/edit','edit' );
        Route::post('/blogs/{id}','update');
        Route::get('/blogs/delete/{id}', 'destroy');
    });
    Route::get('/blogs/publish/{id}', [BlogsController::class,'publish'])->middleware(['role:admin|Super-Admin']);
    Route::controller(UserManageController::class)->middleware(['role:Super-Admin'])->group(function () {
        Route::get('/users', 'index');
        Route::get('/users/create', 'create');
        Route::get('/users/{id}', 'show');
        Route::get('/users/{id}/edit','edit' );
        Route::post('/users-save/{id}','update');
        Route::get('/users/delete/{id}', 'destroy');
    });
   Route::get('/roles', [RolesController::class, 'index'])->middleware(['role:Super-Admin']);
});


