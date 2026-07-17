<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/admin/toggle', [ArticleController::class, 'toggleAdmin'])->name('admin.toggle');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
// Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');


Route::get('/article/create', [ArticleController::class, 'create'])->name('admin.article-create');
Route::post('/article', [ArticleController::class, 'store'])->name('admin.article-store');
Route::get('/articles/{id}/edit', [ArticleController::class, 'edit'])->name('admin.article-edit');
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('admin.article-update');
