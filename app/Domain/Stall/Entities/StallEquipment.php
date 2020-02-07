<?php


namespace App\Domain\Stall\Entities;


use App\Domain\Core\Entity;
use App\Domain\Translation\Traits\Translatable;

/**
 * Class StallEquipment
 * @package App\Domain\Stall\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property string $name
 * @property double $price
 */
class StallEquipment extends Entity
{
    use Translatable;

    protected $table = 'stall_equipment';

    protected $primaryKey = 'id';

    public $timestamps = false;

    /**
     * @inheritDoc
     */
    protected function getTranslatable(): array
    {
        return ['name'];
    }
}
