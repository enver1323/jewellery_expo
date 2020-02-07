<?php


namespace App\Http\Resources;


use App\Domain\Stall\Entities\StallEquipment;

/**
 * Class StallEquipmentResource
 * @package App\Http\Resources
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin StallEquipment
 */
class StallEquipmentResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            self::ID => $this->id,
            self::NAME => sprintf("%s (%s$)", $this->name, $this->price),
            self::PRICE => $this->price,
        ];
    }
}
