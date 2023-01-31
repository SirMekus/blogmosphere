<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     description="Get all articles on the platform",
     *     @OA\Response(response="200", description="Returns all the articles")
     * )
     */

    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return request()->wantsJson() ? $articles : view('articles', ['articles' => $articles]);
    }

    /**
     * @OA\Get(
     *     path="/api/articles/{id}",
     *     description="Read a particular article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of article to be viewed",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(response="200", description="Returns the entire article of a particular article")
     * )
     */
    public function article($id)
    {
        $article = Article::withCount('likes')
            ->with(['comments' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }, 'tags'])->findOrFail($id);

        return request()->wantsJson() ? $article : view('blog', ['article' => $article]);
    }

    public function recordView($id)
    {
        $article = Article::findOrFail($id);
        $article->views = $article->views + 1;
        $article->save();

        return $article->views;
    }
}
