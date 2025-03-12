<?php
namespace App\Http\Controllers\Category\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class ShowController extends Controller
{
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(5);

        $categories = Cache::remember('categories:all',60,fn()=>Category::all());


        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count','DESC')->get()->take(4);

        return view('category.posts.show',compact('category','posts','categories','likedPosts'));
    }

}
