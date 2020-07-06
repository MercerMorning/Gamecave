<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('main'));
});

Breadcrumbs::for('games.list', function ($trail) {
    $trail->parent('home');
    $trail->push('Title Here', route('games.list'));
});
