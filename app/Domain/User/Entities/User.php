<?php

namespace App\Domain\User\Entities;

use App\Domain\Badge\Entities\Badge;
use App\Domain\Catalogue\Entities\Catalogue;
use App\Domain\Industry\Entities\Industry;
use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\Entities\StallEquipment;
use App\Domain\Visa\Entities\Visa;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
 * @property Catalogue $catalogue
 * @property Visa[]|Collection $visas
 * @property Badge[]|Collection $badges
 * @property Stall[]|Collection $stalls
 *
 * @method Builder exhibitors
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

    /**
     * @return bool
     */
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

    /**
     * @return string
     */
    public function getRole(): string
    {
        return trans(sprintf("auth.role%s", ucfirst($this->role)));
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeExhibitors(Builder $query): Builder
    {
        return $query->where('role', '=', self::ROLE_EXHIBITOR);
    }

    /**
     * @return BelongsToMany
     */
    public function stallEquipment(): BelongsToMany
    {
        return $this->belongsToMany(StallEquipment::class,
            'users_stalls_equipment',
            'user_id',
            'stall_equipment_id'
        )->withPivot('quantity');
    }

    /**
     * @return BelongsToMany
     */
    public function industries(): BelongsToMany
    {
        return $this->belongsToMany(Industry::class, 'users_industries');
    }

    /**
     * @return HasOne
     */
    public function catalogue(): HasOne
    {
        return $this->hasOne(Catalogue::class);
    }
}
