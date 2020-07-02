<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\DomCrawler\Crawler;

class Parsing extends Model
{

    public static function getPrice($siteName, $game, $siteAttributes)
    {
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $game));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = $crawler->filter($siteAttributes['price_block']);
            return $parsed->text();
        }
        return 0;
    }
}
