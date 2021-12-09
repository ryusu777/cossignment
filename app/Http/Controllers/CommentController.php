<?php

namespace App\Http\Controllers;

use App\Models\TrPostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = TrPostComment::create($request->all());
        return $comment
                    ->where('comment_id', $comment->comment_id)
                    ->join('users', 'tr_post_comments.user_id', '=', 'users.id')
                    ->select('tr_post_comments.*', 'users.name as user_name')
                    ->get();
    }
}
