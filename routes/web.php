<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ReplyController;


Route::get('/', [DashboardController::class, 'home'])->name('home');

Route::get('/about', [DashboardController::class, 'about'])->name('about');


Route::middleware('auth')->group(function () {

    // Create Data Category

    Route::get('/categories/create', [CategoriesController::class, 'create'])->name('category.create');
    Route::post('/categories', [CategoriesController::class, 'store'])->name('category.store');

    // Read Data Category

    Route::get('/categories', [CategoriesController::class, 'index'])->name('category.index');
    Route::get('/categories/{id}', [CategoriesController::class, 'show'])->name('category.show'); // Added show route

    // Update Data Category
    Route::get('/categories/{id}/edit', [CategoriesController::class, 'edit'])->name('category.edit');
    Route::put('/categories/{id}', [CategoriesController::class, 'update'])->name('category.update');

    // Delete Data Category
    Route::delete('/categories/{id}', [CategoriesController::class, 'destroy'])->name('category.destroy');

    // CRUD News

    Route::resource('news', NewsController::class);
    Route::get('/news/detail/{id}', [NewsController::class, 'detail'])->name('news.detail'); // Added detail route

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');


    // Comment
    Route::post('/comment/{news_id}', [CommentController::class, 'store'])->name('comment.store');

    // Store Reply
    Route::post('/reply/{comment_id}', [ReplyController::class, 'store'])->name('reply.store');
});

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
