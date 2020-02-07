<?php


namespace App\Domain\Catalogue\Entities;


use App\Domain\Core\Entity;
use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Catalogue
 * @package App\Domain\Catalogue\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $user_id
 * @property string $description
 *
 * Relations:
 * @property User $user
 */
class Catalogue extends Entity
{
    protected $table = 'catalogues';

    public $timestamps = true;

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
