<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Like;

class LikeController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles/{id}/like",
     *     description="Endpoint to like a particular article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of article to like",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Returns an integer which represents the updated number of likes for the article")
     * )
     */
    public function likeArticle($id)
    {
        $article = Article::withCount('likes')->findOrFail($id);

        Like::create([
            'article_id'=>$article->id
        ]);

        return Article::withCount('likes')->findOrFail($id)->likes_count;
    }
}
