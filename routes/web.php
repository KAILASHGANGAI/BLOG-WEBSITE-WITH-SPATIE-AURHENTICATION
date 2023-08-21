<?php

use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\EsewaController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SubjectController;
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
Route::get('/my-notes',[WebsiteController::class, 'notes'])->name('notes');
Route::post('/my-notes',[WebsiteController::class, 'notesSearch'])->name('notes.search');
Route::get('/notes/show/{id}',[WebsiteController::class, 'notesShow'])->name('notes.single');
Route::get('/markedread/{id}',[WebsiteController::class, 'markedread'])->name('markedread');

Route::get('/choose-payment-methods/{payment_type}/{id}', [EsewaController::class, 'payWithEsewa']);
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

    Route::get('/blogs/{id}', [BlogsController::class,'show']);
    Route::get('/blogs', [BlogsController::class,'index']);
    Route::get('/blogs/publish/{id}', [BlogsController::class,'publish'])->middleware(['role:admin|Super-Admin']);
    Route::controller(BlogsController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/blogs/create/new', 'create')->name('blogs.create');
        Route::post('/blogs/store', 'store');
        Route::get('/blogs/{id}/edit','edit' );
        Route::post('/blogs/{id}','update');
        Route::get('/blogs/delete/{id}', 'destroy');
    });

    Route::get('/notes/{id}', [NoteController::class,'show']);
    Route::get('/notes', [NoteController::class,'index']);
    Route::controller(NoteController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
       Route::get('/notes/create/new', 'create')->name('notes.create');
       Route::post('/notes/store','store')->name('notes.store');
       Route::get('/notes/show/{id}', 'show')->name('notes.show');
       Route::get('/notes/{id}/edit', 'edit')->name('notes.edit');
       Route::post('/notes/update', 'update')->name('notes.update');
       Route::get('/notes/download/{id}', 'download')->name('notes.download');
       Route::get('/notes/delete/{id}', 'destroy')->name('notes.destroy');

    });   
    Route::controller(FacultyController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/faculty', 'index');
        Route::get('/faculty/create','create')->name('faculty.create');
        Route::post('/faculty/store', 'store')->name('faculty.store');
        Route::get('/faculty/{id}/edit','edit' )->name('faculty.edit');
        Route::post('/faculty','update')->name('faculty.update');
        Route::get('/faculty/delete/{id}', 'destroy')->name('faculty.destroy');
    });
    Route::controller(SubjectController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/subject', 'index');
        Route::get('/subject/create','create')->name('subject.create');
        Route::post('/subject/store', 'store')->name('subject.store');
        Route::get('/subject/{id}/edit','edit' )->name('subject.edit');
        Route::post('/subject','update')->name('subject.update');
        Route::get('/subject/delete/{id}', 'destroy')->name('subject.destroy');
    });
    Route::controller(CategoryController::class)->middleware(['role:writer|Super-Admin'])->group(function () {
        Route::get('/category', 'index');
        Route::post('/category/store', 'store');
        Route::get('/category/{id}/edit','edit' );
        Route::post('/category/{id}','update');
        Route::get('/category/delete/{id}', 'destroy');
    });
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


