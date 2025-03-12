<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    public function index()
    {
        $cntPosts = count(Post::all());

        $categories = Cache::remember('categories:all',60,fn()=>Category::all());

        $cntCategories = count($categories);

        $cntUsers = count(User::all());

        return view('admin.main.index',compact('cntPosts','cntCategories','cntUsers'));
    }
}
