<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function store(CommentRequest $request, Comment $comment)
    {
        // 現在認証しているユーザーのIDを取得
        $id = Auth::id();
        $data = $request->all();
        $comment->commentStore($id, $data);

        return back();
    }

}
