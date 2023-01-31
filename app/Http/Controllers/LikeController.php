<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Like;

class LikeController extends Controller
{
    public function likeArticle($id)
    {
        $article = Article::withCount('likes')->findOrFail($id);

        Like::create([
            'article_id'=>$article->id
        ]);

        return Article::withCount('likes')->findOrFail($id)->likes_count;
    }
}
