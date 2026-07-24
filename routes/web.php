<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

// Toggle admin mode for testing purposes
Route::get('/admin/toggle', [ArticleController::class, 'toggleAdmin'])->name('admin.toggle');
// List all categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// List all articles (admin view or user view based on session)
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
// Show a single article by slug
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('article.show');
// Admin routes for article management
Route::get('/article/create', [ArticleController::class, 'create'])->name('admin.article-create');
// Store a new article
Route::post('/article', [ArticleController::class, 'store'])->name('admin.article-store');
// Edit an existing article
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.article-edit');
// Update an existing article
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('admin.article-update');
// Delete an article
Route::delete('/articles/{id}', [ArticleController::class, 'destroy'])->name('admin.article-delete');
// Publish an article
Route::patch('/articles/{id}/publish', [ArticleController::class, 'publish'])->name('admin.article-publish');

Route::resource('categories', CategoryController::class);


Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', 'create')->name('register.create');
    Route::post('/register', 'store')->name('register.store');
});


Route::get('/login', [LoginController::class, 'create'])->name('login.create');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');