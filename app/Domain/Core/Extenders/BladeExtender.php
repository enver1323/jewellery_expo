<?php


namespace App\Domain\Core\Extenders;


use Illuminate\Support\Facades\Blade;

class BladeExtender implements Extender
{

    /**
     * @inheritDoc
     */
    public static function extend(): void
    {
        Blade::if('admin', function () {
            return auth()->user()->isAdmin();
        });
        Blade::if('exhibitor', function () {
            return auth()->user()->isExhibitor();
        });
    }
}
