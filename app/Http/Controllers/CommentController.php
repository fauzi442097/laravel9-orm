<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function create()
    {
        Comment::factory(rand(1, 10))->create();
        $comments = Comment::all();
        dd($comments);
    }
}
