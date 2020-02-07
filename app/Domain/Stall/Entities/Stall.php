<?php


namespace App\Domain\Stall\Entities;


use App\Domain\Core\Entity;
use App\Domain\Core\Photo\HasPhoto;
use App\Domain\User\Entities\User;
use App\Domain\User\Traits\Approvable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Stall
 * @package App\Domain\Stall\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property integer|null $user_id
 * @property string $name
 * @property integer $floor
 * @property integer $area
 *
 * Relations:
 * @property User $user
 *
 * @method Builder free
 */
class Stall extends Entity
{
    use Approvable, HasPhoto;

    public $timestamps = true;
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

    public function scopeFree(Builder $query): Builder
    {
        $query = $query->whereNull('user_id');

        $user = request()->user();
        if($user && $user->isExhibitor())
            $query = $query->orWhere('user_id', '=', $user->id);

        return $query;
    }

    /**
     * @inheritDoc
     */
    protected function getPhotoSizes(): array
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    protected function getPhotoDirectoryPath(): string
    {
        return 'stalls';
    }
}
