<?php


namespace App\Domain\Industry\Entities;


use App\Domain\Core\Entity;

/**
 * Class Industry
 * @package App\Domain\Industry\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 * @property integer $id
 * @property string $name
 */
class Industry extends Entity
{
    protected $table = 'industries';
}
