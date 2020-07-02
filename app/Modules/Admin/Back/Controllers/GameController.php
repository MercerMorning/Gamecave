<?php

namespace App\Modules\Admin\Back\Controllers;

use App\Game;
use App\Http\Requests\GameRequest;
use App\Parsing;
use App\Site;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    function create()
    {
        return view('admin.games.create');
    }

    function edit($game)
    {
        return view('admin.games.edit', ['game' => $game]);
    }

//    function add(GameRequest $request)
//    {
////        foreach (SITES as $key) {
////            echo Parsing::price($key, urlName($request->name), $key['priceBlock']);
////        }
//        foreach (SITES as $key) {
//            $site = new Site();
//            $site->name = $key['name'];
//            $site->description = $request->name;
//            $site->price = clearPrice(Parsing::price($key, urlName($request->name), $key['priceBlock']));
//            $site->save();
//        }
//        $game = new Game();
//        $game->name = $request->name;
//        $game->price = $request->price;
//        $game->description = $request->description;
//        $game->category = $request->category;
//        $game->image = $request->file('image')->store('uploads', 'public');
//        $game->save();
//        return redirect()->route('admin.list');
//    }

    function add(Request $request)
    {
        $sites = new SiteController();
        $sites->add($request);
        $game = new Game();
        $game->name = $request->name;
        $game->description = $request->description;
        $game->category = $request->category;
        $game->image = $request->file('image')->store('uploads', 'public');
        $game->save();
        return redirect()->route('admin.index');
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
