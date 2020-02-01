<?php


namespace App\Domain\Badge\UseCases;


use App\Domain\Badge\Entities\Badge;
use App\Domain\Core\Service;
use App\Domain\User\Entities\User;
use App\Http\Requests\Badge\BadgeDestroyRequest;
use App\Http\Requests\Badge\BadgeStoreRequest;
use App\Http\Requests\Badge\BadgeUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BadgeService
 * @package App\Domain\Badge\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Badge $badges
 */
class BadgeService extends Service
{
    private $badges;

    public function __construct(Badge $badges)
    {
        $this->badges = $badges;
    }

    /**
     * @param BadgeStoreRequest $request
     * @param User $user
     * @return Badge|Model
     */
    public function create(BadgeStoreRequest $request, User $user)
    {
        return $user->badges()->create($request->validated());
    }

    /**
     * @param BadgeUpdateRequest $request
     * @param Badge $badge
     * @return Badge
     */
    public function update(BadgeUpdateRequest $request, Badge $badge): Badge
    {
        $badge->update($request->validated());
        return $badge;
    }

    /**
     * @param Badge $badge
     * @return bool
     * @throws Exception
     */
    public function destroy(Badge $badge): bool
    {
        return $badge->delete();
    }
}
