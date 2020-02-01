<?php


namespace App\Domain\Core\Extenders;


interface Extender
{
    /**
     * Registers extenders, macros and morphs
     */
    public static function extend(): void;
}
