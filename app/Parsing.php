<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\DomCrawler\Crawler;

class Parsing extends Model
{

    public static function getPrice($siteName, $game, $siteAttributes)
    {
        $gameName = $game;
        $gamePart = preg_replace('~\D+~','', $game);
        $figures = config('figures.figures');
        $letters = config('figures.letters');
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $gameName));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = $crawler->filter($siteAttributes['price_block']);
            return $parsed->text();
        }

        if (array_key_exists($gamePart, $figures)) {
            $gamePart = $figures[$gamePart];
            $gameName = preg_replace('~\d+~','', $game);
            $gameName = $gameName . $gamePart;
            @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $gameName));
            if ($html) {
                $crawler = new Crawler($html);
                $parsed = $crawler->filter($siteAttributes['price_block']);
                return $parsed->text();
            }
        }

        $gameName = str_split($gameName);
        $altName = '';
        foreach ($gameName as $gameLetter) {
            foreach ($letters as $letter => $value) {
                if ($gameLetter == $letter) {
                    $altName .= ' ' . $value;
                }
            }
        }
        $gameName = trim($altName) . ' ' . $gamePart;
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], getUrlName($gameName)));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = $crawler->filter($siteAttributes['price_block']);
            return $parsed->text();
        }

        return 0;
    }


    public static function getStatus($siteName, $game, $siteAttributes) {
        $gameName = $game;
        $figures = config('figures.figures');
        $letters = config('figures.letters');

        /** Полное совпадение 11*/
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], $gameName));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = boolval($crawler->filter($siteAttributes['price_block']));
            if ($parsed) {
                return 'p11';
            }
        }

        /** Несовпдание по числу и имени, число и имя меняем 10*/
        $gamePart = preg_replace('~\D+~','', $game);
        if (array_key_exists($gamePart, $figures)) {
            $gamePart = $figures[$gamePart];
            $gameName = preg_replace('~\d+~','', $game);
            $gameName = $gameName . $gamePart;
            $gameName = str_split($gameName);
            $altName = '';
            foreach ($gameName as $gameLetter) {
                foreach ($letters as $letter => $value) {
                    if ($gameLetter == $letter) {
                        $altName .= ' ' . $value;
                    }
                }
            }
            $gameName = trim($altName) . ' ' . $gamePart;
            @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], getUrlName($gameName)));
            if ($html) {
                $crawler = new Crawler($html);
                $parsed = boolval($crawler->filter($siteAttributes['price_block']));
                if ($parsed) {
                    return 'p00';
                }
            }
        }

        $gamePart = preg_replace('~\D+~','', $game);

        /** Несовпадение по имени, меняем имя 01*/
        $gameName = str_split($gameName);
        $altName = '';
        foreach ($gameName as $gameLetter) {
            foreach ($letters as $letter => $value) {
                if ($gameLetter == $letter) {
                    $altName .= ' ' . $value;
                }
            }
        }
        $gameName = trim($altName) . ' ' . $gamePart;
        @$html = file_get_contents(@getFullAddress($siteName . $siteAttributes['last_domen'] . $siteAttributes['path'], getUrlName($gameName)));
        if ($html) {
            $crawler = new Crawler($html);
            $parsed = boolval($crawler->filter($siteAttributes['price_block']));
            if ($parsed) {
                return 'p01';
            }
        }

        /** Полное несовпадение 00*/
        return '000';
    }

    public static function rename($code, $game)
    {
        $gameName = $game;
        $gamePart = preg_replace('~\D+~','', $game);
        $figures = config('figures.figures');
        $letters = config('figures.letters');

        if ($code == 'p11') {
            return $gameName;
        }
        if ($code == 'p00') {
            if (array_key_exists($gamePart, $figures)) {
                $gamePart = $figures[$gamePart];
                $gameName = preg_replace('~\d+~','', $game);
                $gameName = $gameName . $gamePart;
                $gameName = str_split($gameName);
                $altName = '';
                foreach ($gameName as $gameLetter) {
                    foreach ($letters as $letter => $value) {
                        if ($gameLetter == $letter) {
                            $altName .= ' ' . $value;
                        }
                    }
                }
                $gameName = trim($altName) . ' ' . $gamePart;
                return $gameName;
            }
        }
        if ($code == 'p01') {
            $gameName = str_split($gameName);
            $gamePart = $figures[$gamePart];
            $altName = '';
            foreach ($gameName as $gameLetter) {
                foreach ($letters as $letter => $value) {
                    if ($gameLetter == $letter) {
                        $altName .= ' ' . $value;
                    }
                }
            }
            $gameName = trim($altName) . ' ' . $gamePart;
            return $gameName;
        }
    }
}
