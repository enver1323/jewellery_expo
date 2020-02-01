<?php


namespace App\Domain\Core\Extenders;


use Illuminate\Database\Eloquent\Relations\Relation;

class RelationExtender implements Extender
{

    /**
     * Registers extenders, macros and morphs
     */
    public static function extend(): void
    {
        Relation::morphMap([

        ]);
    }
}
