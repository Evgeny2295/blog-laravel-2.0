<?php
namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Post;
use App\Models\PostUserComment;

class StoreController extends Controller
{
    public function store(Post $post,StoreRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $data['post_id'] = $post->id;

        PostUserComment::create($data);

        return redirect()->route('post.show',$post->id);
    }
}
