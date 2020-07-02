<?php

namespace App\Modules\Pub\Front\Controllers;

use App\Comment;
use App\Game;
use App\Parsing;
use App\Site;
use Illuminate\Http\Request;
use Symfony\Component\DomCrawler\AbstractUriElement;
use Symfony\Component\DomCrawler\Crawler;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function home()
    {
        return view('home');
    }

    public function list()
    {
        $games = Game::all();
        return view('games.list', ['games' => $games]);
    }

    public function single($game)
    {
        //TODO: откорректировать
        $comments = Comment::all()->where('game_id', '=', $game);
        $game = Game::query()->find($game);
        $prices = Site::query()
            ->where('game_name', '=', $game->name)
            ->orderByDesc('created_at')
            ->limit(count(SITES))
            ->get();
        $table = Site::query()
            ->where('game_name', '=', $game->name)
            ->orderByDesc('created_at')
            ->get();
        $nameForLink = getUrlName($game->name);
        return view('games.single', ['game' => $game, 'prices' => $prices, 'nameForLink' => $nameForLink, 'comments' => $comments, 'table' => $table]);
    }

    public function link($siteName, $gameName)
    {
        $sitesList = config('site.sites');
        $siteAttr = $sitesList[$siteName];
        return redirect(getFullAddress($siteName . $siteAttr['last_domen'] . $siteAttr['path'], getUrlName($gameName)));
    }

//    public function main()
//    {
//        return view('gamecave.main');
//    }
//

//
}
