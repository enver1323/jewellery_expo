<?php


namespace App\Http\Resources;


use App\Domain\Industry\Entities\Industry;

/**
 * Class IndustryResource
 * @package App\Http\Resources
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin Industry
 */
class IndustryResource extends BaseJsonResource
{
    public function toArray($request)
    {
        return [
            self::ID => $this->id,
            self::NAME => str_repeat('~', $this->depth).$this->name
        ];
    }
}
