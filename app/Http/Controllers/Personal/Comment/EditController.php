<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\PostUserComment;

class EditController extends Controller
{
    public function edit(PostUserComment $comment)
    {
        return view('personal.comment.edit',compact('comment'));
    }
}
