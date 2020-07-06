<?php

namespace App\Modules\Pub\Front\Controllers;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function add(Request $request, $id)
    {
        $comment = new Comment();
        $comment->game_id = $id;
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
        $comment->message = $request->message;
        $comment->save();
        return back();
    }
}
