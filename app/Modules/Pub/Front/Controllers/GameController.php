<?php

namespace App\Modules\Admin\Faq\Controllers;

use App\Game;
use App\Http\Requests\GameRequest;
use App\Parsing;
use App\Site;
use Illuminate\Http\Request;

class GameController extends Controller
{
    function create()
    {
        return view('gamecave.games.create');
    }

    function edit($game)
    {
        return view('gamecave.games.edit', ['game' => $game]);
    }

    function add(GameRequest $request)
    {
//        foreach (SITES as $key) {
//            echo Parsing::price($key, urlName($request->name), $key['priceBlock']);
//        }
        foreach (SITES as $key) {
            $site = new Site();
            $site->name = $key['name'];
            $site->description = $request->name;
            $site->price = clearPrice(Parsing::getPrice($key, urlName($request->name), $key['priceBlock']));
            $site->save();
        }
        $game = new Game();
        $game->name = $request->name;
        $game->price = $request->price;
        $game->description = $request->description;
        $game->category = $request->category;
        $game->image = $request->file('image')->store('uploads', 'public');
        $game->save();
        return redirect()->route('admin.list');
    }

    function save(Request $request)
    {
        $game = Game::query()->find($request->id);
        $game->name = $request->name;
        $game->price = $request->price;
        //$game->image = $request->file('image')->store('uploads', 'public');
        //$game->description = $request->description;
        $game->category = $request->category;
        $game->save();
        return redirect()->route('admin.list');
    }

    function delete(Request $request)
    {
        Game::destroy($request->id);
        return redirect()->route('admin.list');
    }
}
