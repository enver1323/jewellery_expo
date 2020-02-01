<?php


namespace App\Domain\Core;


use Eloquent;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Entity
 * @package App\Domain\Core
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin Eloquent
 */
class Entity extends Model
{
    protected $guarded = [];

    public $timestamps = false;
}
