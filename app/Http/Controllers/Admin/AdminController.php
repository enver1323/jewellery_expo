<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Core\Config\EditableConfig;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ViewMessaging;

/**
 * Class AdminController
 * @package App\Http\Controllers\Admin
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 */
class AdminController extends Controller implements  ViewMessaging
{
    const ITEMS_PER_PAGE = 15;

    protected function render($view, $params = [])
    {
        $params = $this->setParams($params);
        return view($view, $params);
    }

    protected function setParams(array $params)
    {
        $default = [
            'languages' => EditableConfig::find('languages')
        ];

        return array_merge($default, $params);
    }
}
