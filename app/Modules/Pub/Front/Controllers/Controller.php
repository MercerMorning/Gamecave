<?php

namespace  App\Modules\Pub\Front\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

//    www function __construct()
//    {
//        $this->breadcrumbs = new \Creitive\Breadcrumbs\Breadcrumbs;
//
//        $classes = array('breadcrumb', 'breadcrumb-item');
//        $this->breadcrumbs->addCssClasses($classes);
//        $this->breadcrumbs->setDivider('');
//
//        $this->breadcrumbs->addCrumb('Home', route('home'));
//
//    }
}
