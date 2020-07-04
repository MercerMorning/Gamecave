<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\DomCrawler\Crawler;

class Parsing extends Model
{

    public static function getPrice($siteName, $game, $siteAttributes)
    {
        $gameName = $game;
        $figures = config('figures.figures');
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $gameName));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = $crawler->filter($siteAttributes['price_block']);
            return $parsed->text();
        }
        $gamePart = preg_replace('~\D+~','', $game);
        if (array_key_exists($gamePart, $figures)) {
            $gamePart = $figures[$gamePart];
            $gameName = preg_replace('~\d+~','', $game);
            $gameName = $gameName . ' ' . $gamePart;
            @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $gameName));
            if ($html) {
                $crawler = new Crawler($html);
                $parsed = $crawler->filter($siteAttributes['price_block']);
                return $parsed->text();
            }
        }
        return 0;
    }

    public static function getStatus($game) {
        
    }
}
