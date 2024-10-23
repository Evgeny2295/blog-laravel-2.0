<?php

namespace App\Http\Controllers\Personal\Login;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return redirect()->route('login');
    }
}
