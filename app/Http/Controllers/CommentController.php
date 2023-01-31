<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/articles/{id}/comment",
     *     description="Creates comment on a particular article",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of article to comment on",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Invalid input or incomplete form entry"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Successful"
     *     ),
     *     @OA\RequestBody(
     *         description="Input data format",
     *         @OA\MediaType(
     *             mediaType="application/x-www-form-urlencoded",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(
     *                     property="name",
     *                     description="name of person making the comment",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     description="Email address of the person making the comment.",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="subject",
     *                     description="subject of the comment",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="article_id",
     *                     description="ID of article for the comment",
     *                     type="string",
     *                 ),
     *                 @OA\Property(
     *                     property="body",
     *                     description="Actual comment itself",
     *                     type="string"
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function commentOnArticle($id)
    {
        $message = [
            'body.required' => "Please write a comment"
        ];

        request()->validate([
            'name' => ['bail', 'required', 'string'],
            'email' => ['bail', 'required', 'email'],
            'subject' => ['bail', 'required', 'string'],
            'article_id' => ['bail', 'string', 'exists:articles,id'],
            'body' => ['bail', 'required', 'string'],
        ], $message);

        Comment::create(
            [
                'name' => request()->name, 'email' => request()->email, 'subject' => request()->subject, 'article_id' => request()->article_id, 'body' => request()->body
            ]
        );

        return response("Your comment was sent successfully");
    }
}
