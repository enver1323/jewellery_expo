<?php


namespace App\Http\Controllers\Web;


use App\Domain\Core\Config\EditableConfig;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViewMessaging;

class WebController extends Controller implements ViewMessaging
{
    protected function render($view, $params = [])
    {
        $params = $this->setParams($params);
        return view($view, $params);
    }

    protected function setParams(array $params)
    {
        $default = [
            'partners' => EditableConfig::find('partners'),
            'links' => EditableConfig::find('links')
        ];

        return array_merge($default, $params);
    }
}
