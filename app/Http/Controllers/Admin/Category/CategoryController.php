<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Cache::remember('categories:all',60,fn()=>Category::all());

        return view('admin.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $category = Category::firstOrCreate($data);

        if(!Cache::get('categories:'.$category->id)) Cache::put('categories:' . $category->id,$category);

        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Cache::get('categories:' . $id);

        return view('admin.categories.show',compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Cache::get('categories:' . $id);

        return view('admin.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,$id)
    {
        $category = Cache::get('categories:' . $id);

        $data = $request->validated();

        $category->update($data);

        Cache::put('categories:' . $category->id,$category);

        return view('admin.categories.show',compact('category'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Cache::get('categories:' . $id);

        $category->delete();

        Cache::forget('categories:' . $category->id);

        return redirect()->route('categories.index');
    }
}
