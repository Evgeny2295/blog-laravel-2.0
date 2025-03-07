<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use const http\Client\Curl\POSTREDIR_301;

class IndexController extends Controller
{
    public function index()
    {
        $cntPosts = count(Post::all());
        $cntCategories = count(Category::all());
        $cntUsers = count(User::all());
        return view('admin.main.index',compact('cntPosts','cntCategories','cntUsers'));
    }
}
