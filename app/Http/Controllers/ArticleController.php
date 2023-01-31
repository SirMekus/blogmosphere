<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/articles",
     *     @OA\Response(response="200", description="An example endpoint")
     * )
     */

    public function articles()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return request()->wantsJson() ? $articles : view('articles', ['articles' => $articles]);
    }

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
