<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    function add(Request $request, $id)
    {
        $comment = new Comment();
        $comment->game_id = $id;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->message = $request->message;
        $comment->save();
        return back();
    }
}
