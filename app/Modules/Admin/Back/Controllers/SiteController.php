<?php

namespace App\Modules\Admin\Back\Controllers;

use App\Http\Controllers\Controller;
use App\Parsing;
use App\Site;

class SiteController extends Controller
{
    public function add($request)
    {
        $sitesList = config('site.sites');
        if ($sitesList) {
            foreach ($sitesList as $key => $value) {
                $site = new Site();
                $site->site_name = $key;
                $site->game_name = $request->name;
                $site->status = Parsing::getStatus($key, getUrlName($request->name), $value);
                $site->price = clearPrice(Parsing::getPrice($key, getUrlName($request->name), $value));
                $site->save();
            }
        }
    }
}
