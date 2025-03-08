<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        $cntLikedPosts = count(auth()->user()->posts);

        $cntComments = count(auth()->user()->comments);

        return view('personal.main.index',compact('cntLikedPosts','cntComments'));
    }

}
