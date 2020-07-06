<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

$modules = config('modular.modules');
$path = config('modular.path');
$base_namespace = config('modular.base_namespace');

if ($modules) {
    foreach ($modules as $module => $submodules) {
        foreach ($submodules as $key => $sub) {
            if (is_string($key)) {
                $sub = $key;
            }

            $relativePath = '/' . $module . '/' . $sub;
            $routesPath = $path . $relativePath . '/Routes/web.php';

            if (file_exists($routesPath)){
                Route::namespace('Modules\\' . $module . '\\' . $sub . '\Controllers')->group($routesPath);
            }
        }
    }
}

//Auth::routes();
