<?php

namespace  App\Modules\Pub\Front\Controllers;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function index()
    {
        var_dump(session()->all());

        function delete($sessionData){
            foreach ($sessionData as $data => $inf) {
                if (is_array($data)) {
                    delete($data);
                }
                session()->pull($data, $inf);
            }
        }
        $sessionData = session()->all();
        delete($sessionData);
    }
}
