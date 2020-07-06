<?php
function getUrlName($name) {
    $name = mb_strtolower($name);
    $name = str_replace(':', '', $name);
    $name = str_replace(' ', '-', $name);
    return $name;
}

function clearPrice($price) {
    $price = preg_replace('~\D+~','', $price);
    return $price;
}

function getFullAddress($site, $game) {
    return 'https://'. $site . $game;
}

const SITES = [
    'zaka-zaka' => ['name' => 'zaka-zaka', 'domen' => '.com', 'dir' => '/game/', 'priceBlock' => '.price'],
    'gabestore' => ['name' => 'gabestore', 'domen' => '.ru', 'dir' => '/game/', 'priceBlock' => '.b-card__price-currentprice'],
    'steampay' => ['name' => 'steampay', 'domen' => '.com', 'dir' => '/game/', 'priceBlock' => '.product__current-price'],
];
