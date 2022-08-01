<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CommentPolymorphic;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Video;

class CommentController extends Controller
{
    //
    public function create()
    {
        Comment::factory(rand(1, 10))->create();
        $comments = Comment::all();
        dd($comments);
    }

    public function index()
    {
        $comments = CommentPolymorphic::whereHasMorph(
            'commentable',
            [Post::class, Video::class],
            function ($query) {
                $query->whereRaw("LOWER(body) LIKE '%comment%'");
            }
        )->get();

        // Cari ke-2
        // $comments = CommentPolymorphic::whereHasMorph(
        //     'commentable',
        //     '*',
        //     function ($query) {
        //         $query->whereRaw("LOWER(body) LIKE '%comment%'");
        //     }
        // )->get();

        $notContainComment = CommentPolymorphic::whereDoesntHaveMorph(
            'commentable',
            [Post::class, Video::class],
            function ($query, $type) {
                $query->whereRaw("LOWER(body) LIKE '%comment%'");
            }
        )->get();

        dd($notContainComment);
    }
}
