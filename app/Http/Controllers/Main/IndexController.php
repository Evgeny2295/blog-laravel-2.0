<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {

        $posts = Post::orderBy('created_at','DESC')->paginate(5);

        $categories = Cache::remember('categories:all',60,fn()=>Category::all());

        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);

        return view('main.index',compact('posts','categories','likedPosts'));
    }

}
