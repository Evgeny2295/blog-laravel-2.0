<?php
namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        Carbon::setLocale('ru-RU');

        $date = Carbon::parse($post->created_at);

        $categories = Cache::remember('categories:all',60,fn()=>Category::all());

        $relatedPosts = Post::where('category_id',$post->category_id)
            ->where('id','!=',$post->id)
            ->get()
            ->take(3);

        return view('post.show',compact('post','date','relatedPosts','categories'));
    }
}
