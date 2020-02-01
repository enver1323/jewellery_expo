<?php


namespace App\Domain\User\Entities;


use App\Domain\Core\Country;
use App\Domain\Core\Entity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Throwable;

/**
 * Class Profile
 * @package App\Domain\User\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $user_id
 * @property string $company
 * @property string $phone
 * @property string $country_code
 * @property string $position
 * @property string $gender
 *
 * Relations:
 * @property User $user
 * @property Country $country
 */
class Profile extends Entity
{
    const GENDER_MALE = 'male';
    const GENDER_FEMALE = 'female';

    protected $table = 'profiles';

    protected $primaryKey = 'user_id';

    public $country = null;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return Country
     * @throws Throwable
     */
    public function getCountry(): Country
    {
        $this->country = $this->country ?? new Country($this->country_code);
        return $this->country;
    }

    /**
     * @return bool
     */
    public function isMale(): bool
    {
        return $this->gender == self::GENDER_MALE;
    }
}
