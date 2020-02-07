<?php


namespace App\Http\Resources;


use App\Domain\User\Entities\User;

/**
 * Class UserResource
 * @package App\Http\Resources
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @mixin User
 */
class UserResource extends BaseJsonResource
{
    public function toArray($request)
    {
        $profile = $this->profile;

        return [
            self::ID => $this->id,
            self::NAME => $this->name,
            self::ROLE => $this->role,
            self::EMAIL => $this->email,

            self::PHONE => $profile->phone,
            self::GENDER => $profile->gender,
            self::COMPANY => $profile->company,
            self::COUNTRY => new CountryResource($profile->getCountry()),
            self::POSITION => $profile->position,
        ];
    }
}
