<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/articles', [ArticleController::class, 'index']);
