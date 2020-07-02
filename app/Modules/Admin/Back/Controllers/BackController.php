<?php

namespace App\Modules\Admin\Back\Controllers;

use App\Category;
use App\Game;
use App\Http\Controllers\Controller;

class BackController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $categories = Category::all();
        return view('admin.list', ['games' => $games, 'categories' => $categories]);
    }
}
