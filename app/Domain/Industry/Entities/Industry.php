<?php


namespace App\Domain\Industry\Entities;


use App\Domain\Core\Entity;
use App\Domain\Translation\Traits\Translatable;
use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Industry
 * @package App\Domain\Industry\Entities
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 * @property integer $id
 * @property string $name
 *
 * Relations:
 * @property User[]|Collection $users
 */
class Industry extends Entity
{
    use NodeTrait, Translatable;

    protected $table = 'industries';

    /**
     * @inheritDoc
     */
    protected function getTranslatable(): array
    {
        return ['name'];
    }

    /**
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'users_industries');
    }
}
