<?php


namespace App\Http\Resources;


use App\Domain\Stall\Entities\Stall;

/**
 * Class StallResource
 * @package App\Http\Resources
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin Stall
 */
class StallResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            self::ID => $this->id,
            self::NAME => sprintf("%s %s - %s", __('frontend.floor'), $this->floor, $this->name,),
            self::FLOOR => $this->floor,
            self::AREA => $this->area,
            self::PHOTO => isset($this->photo) ? $this->photo->getUrl() : null,
        ];
    }
}
