<?php


namespace App\Http\Controllers\Web;


use App\Domain\Core\Config\EditableConfig;

/**
 * Class IndexController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 */
class IndexController extends WebController
{
    public function index()
    {
        return $this->render('frontend.index.index', [
            'expoDate' => EditableConfig::find('expoDate'),
        ]);
    }
}
