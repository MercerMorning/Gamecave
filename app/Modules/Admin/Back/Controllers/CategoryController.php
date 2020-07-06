<?php

namespace App\Modules\Admin\Back\Controllers;
use App\Category;
use App\Http\Controllers\Controller;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    function create()
    {
        return view('admin.categories.create');
    }

    function edit($category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    function add(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.index');
    }

    function save(Request $request)
    {
        $category = Category::query()->find($request->id);
        $category->name = $request->name;
        $category->description = $request->description;
        $category->save();
        return redirect()->route('admin.index');
    }

    function delete(Request $request)
    {
        Category::destroy($request->id);
        return redirect()->route('admin.index');
    }
}
