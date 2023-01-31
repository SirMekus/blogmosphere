<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('articles', [App\Http\Controllers\ArticleController::class, 'articles'])->name('articles');

Route::get('articles/{id}', [App\Http\Controllers\ArticleController::class, 'article'])->name('article');

Route::post('articles/{id}/comment', [App\Http\Controllers\CommentController::class, 'commentOnArticle'])->name('comment');

Route::get('articles/{id}/like', [App\Http\Controllers\LikeController::class, 'likeArticle'])->name('like');

Route::get('articles/{id}/view', [App\Http\Controllers\ArticleController::class, 'recordView'])->name('views');
