<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('articles', [App\Http\Controllers\ArticleController::class, 'articles'])->name('articles');

Route::get('articles/{id}', [App\Http\Controllers\ArticleController::class, 'article'])->name('article');

Route::post('articles/{id}/comment', [App\Http\Controllers\CommentController::class, 'commentOnArticle'])->name('comment');

Route::get('articles/{id}/like', [App\Http\Controllers\LikeController::class, 'likeArticle'])->name('like');

Route::get('articles/{id}/view', [App\Http\Controllers\ArticleController::class, 'recordView'])->name('views');
