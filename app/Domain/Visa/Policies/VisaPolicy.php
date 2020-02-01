<?php


namespace App\Domain\Visa\Policies;


use App\Domain\User\Entities\User;
use App\Domain\Visa\Entities\Visa;
use Illuminate\Auth\Access\HandlesAuthorization;

class VisaPolicy
{
    use HandlesAuthorization;

    /**
     * @param User $user
     * @param Visa $visa
     * @return bool
     */
    public function update(User $user, Visa $visa): bool
    {
        return $visa->user_id === $user->id;
    }

    /**
     * @param User $user
     * @param Visa $visa
     * @return bool
     */
    public function delete(User $user, Visa $visa): bool
    {
        return $visa->user_id === $user->id;
    }
}
