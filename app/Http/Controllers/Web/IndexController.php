<?php


namespace App\Http\Controllers\Web;


use App\Domain\Core\Config\EditableConfig;
use App\Domain\Slide\Entities\Slide;

/**
 * Class IndexController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Slide $slides
 */
class IndexController extends WebController
{
    private $slides;

    public function __construct(Slide $slides)
    {
        $this->slides = $slides;
    }

    public function index()
    {
        return $this->render('frontend.index.index', [
            'expoDate' => EditableConfig::find('expoDate'),
            'slides' => $this->slides->orderBy('order')->get()
        ]);
    }
}
