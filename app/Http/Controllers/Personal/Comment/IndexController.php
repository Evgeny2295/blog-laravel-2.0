<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {

         $comments = auth()->user()->comments;
         foreach ($comments as $comment){
           $comment->title = $comment->post->title;

         }

         return view('personal.comment.index',compact('comments'));
    }
}
