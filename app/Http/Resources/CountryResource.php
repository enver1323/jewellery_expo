<?php

namespace App\Http\Resources;

use App\Domain\Core\Country;

/**
 * Class CountryResource
 * @package App\Http\Resources
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin Country
 */
class CountryResource extends BaseJsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            self::ID => $this->id,
            self::NAME =>$this->name
        ];
    }
}
