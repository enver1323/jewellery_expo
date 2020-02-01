<?php

namespace App\Domain\User\Entities;

use App\Domain\Badge\Entities\Badge;
use App\Domain\Stall\Entities\Stall;
use App\Domain\Visa\Entities\Visa;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;

/**
 * Class User
 * @package App\Domain\User\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $role
 * @property Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * Relations:
 * @property Profile $profile
 * @property Visa[]|Collection $visas
 * @property Badge[]|Collection $badges
 * @property Stall[]|Collection $stalls
 */
class User extends BaseUser implements Permission
{
    use Notifiable;

    public $timestamps = true;
    protected $table = 'users';

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role == self::ROLE_ADMIN;
    }

    public function isExhibitor(): bool
    {
        return $this->role == self::ROLE_EXHIBITOR;
    }

    /**
     * @return HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function badges(): HasMany
    {
        return $this->hasMany(Badge::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function visas(): HasMany
    {
        return $this->hasMany(Visa::class, 'user_id', 'id');
    }

    /**
     * @return HasMany
     */
    public function stalls(): HasMany
    {
        return $this->hasMany(Stall::class, 'user_id', 'id');
    }
}
