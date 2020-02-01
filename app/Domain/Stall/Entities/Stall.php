<?php


namespace App\Domain\Stall\Entities;


use App\Domain\Core\Entity;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\Approvable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Stall
 * @package App\Domain\Stall\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $number
 * @property integer $area
 *
 * Relations:
 * @property User $user
 */
class Stall extends Entity
{
    use Approvable;

    protected $table = 'stalls';

    protected $casts = [
        'number' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
