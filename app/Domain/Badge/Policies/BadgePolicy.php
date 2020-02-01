<?php

namespace App\Domain\Badge\Policies;

use App\Domain\Badge\Entities\Badge;
use App\Domain\User\Entities\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BadgePolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Badge $badge
     * @return bool
     */
    public function update(User $user, Badge $badge): bool
    {
        return $badge->user_id === $user->id;
    }

    /**
     * @param User $user
     * @param Badge $badge
     * @return bool
     */
    public function delete(User $user, Badge $badge): bool
    {
        return $badge->user_id === $user->id;
    }
}
