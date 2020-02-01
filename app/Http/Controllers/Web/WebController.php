<?php


namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Http\Controllers\ViewMessaging;

class WebController extends Controller implements ViewMessaging
{
    protected function render($view, $params = [])
    {
        return view($view, $params);
    }
}
