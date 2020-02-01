<?php


namespace App\Domain\Visa\Entities;


use App\Domain\Core\Entity;
use App\Domain\User\Entities\Profile;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\Approvable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Visa
 * @package App\Domain\Visa\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $gender
 * @property string $position
 * @property string $address
 * @property string $citizenship
 * @property string $embassy_address
 * @property Carbon $check_in_at
 * @property Carbon $check_out_at
 *
 * Relations:
 * @property User $user
 */
class Visa extends Entity
{
    use Approvable;

    protected $table = 'visas';

    public $timestamps = true;

    public $casts = [
        'check_in_at' => 'datetime',
        'check_out_at' => 'datetime'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return bool
     */
    public function isMale(): bool
    {
        return $this->gender == Profile::GENDER_MALE;
    }
}
