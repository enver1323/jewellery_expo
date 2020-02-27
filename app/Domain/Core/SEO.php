<?php


namespace App\Domain\Core;



use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class SEO
{
    public $img;
    public $tags;
    public $title;
    public $locale;
    public $description;

    public function __construct()
    {
        $this->locale = LaravelLocalization::getCurrentLocaleRegional();
    }
}
