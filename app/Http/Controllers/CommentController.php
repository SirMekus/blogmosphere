<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function commentOnArticle($id)
    {
        $message = [
            'body.required'=>"Please write a comment"
        ];

        request()->validate([
            'name' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'email'],
            'subject' => ['bail', 'required', 'string'],
            'article_id' => ['bail', 'string', 'exists:articles,id'],
            'body' => ['bail', 'required', 'string'],
            ], $message);

        Comment::updateOrCreate(
                ['email' => request()->email],
                ['name' => request()->name, 'subject' => request()->subject
                , 'article_id' => request()->article_id, 'body' => request()->body]
            );

        return response("Your comment was sent successfully");
    }
}
