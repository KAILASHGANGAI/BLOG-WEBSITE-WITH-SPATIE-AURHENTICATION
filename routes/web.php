<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WebsiteController::class, 'index']);
Route::get('/single-blog/{id}', [WebsiteController::class, 'show'])->middleware('auth');
Route::post('/search-blog',[WebsiteController::class, 'search'])->name('search');
Route::get('/blog/category/{category}', [WebsiteController::class, 'categoryBlogs']);
Route::post('/comment-submit', [CommentController::class, 'store'])->name('comment');
Route::post('/send-message', [MessageController::class, 'sendMessage']);
Route::get('/get-message', [MessageController::class, 'getMessage']);
Route::get('/notes',[WebsiteController::class, 'notes'])->name('notes');

Route::get('/choose-payment-methods/{id}', [EsewaController::class, 'payWithEsewa']);
Route::view('/login', 'auth.login')->name('login');

Route::view('/register', 'auth.register')->name('register');

Route::post('login-check', [UserController::class,'login']);
Route::post('register-save',[UserController::class, 'register']);
Route::get('/logout',[UserController::class,'logout']);

Route::get('/choose-payment-methods/{id}', [EsewaController::class, 'payWithEsewa'])->middleware('auth');

Route::get('/success', [EsewaController::class, 'esewaPaySuccess']);
Route::get('/failed', [EsewaController::class, 'esewaPayFailed']);


Route::middleware(['auth'])->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::controller(BlogsController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/blogs/create', 'create');
        Route::post('/blogs/store', 'store');
        Route::get('/blogs/{id}/edit','edit' );
        Route::post('/blogs/{id}','update');
        Route::get('/blogs/delete/{id}', 'destroy');
    });
    Route::controller(CategoryController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/category', 'index');
        Route::post('/category/store', 'store');
        Route::get('/category/{id}/edit','edit' );
        Route::post('/category/{id}','update');
        Route::get('/category/delete/{id}', 'destroy');
    });

    Route::get('/blogs/{id}', [BlogsController::class,'show']);

    Route::get('/blogs', [BlogsController::class,'index']);

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
   Route::get('/payments', [EsewaController::class, 'index'])->middleware(['role:Super-Admin']);
});


