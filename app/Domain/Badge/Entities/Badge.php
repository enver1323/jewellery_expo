<?php


namespace App\Domain\Badge\Entities;


use App\Domain\Core\Entity;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\Approvable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Badge
 * @package App\Domain\Badge\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $position
 *
 * Relations:
 * @property User $user
 */
class Badge extends Entity
{
    use Approvable;

    public $timestamps = true;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
