<?php


namespace App\Domain\User\UseCases;


use App\Domain\Core\Service;
use App\Domain\User\Entities\Profile;
use App\Domain\User\Entities\User;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

/**
 * Class UserService
 * @package App\Domain\User\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property User $users
 * @property Profile $profiles
 */
class UserService extends Service
{
    private $users;
    private $profiles;

    public function __construct(User $users, Profile $profiles)
    {
        $this->users = $users;
        $this->profiles = $profiles;
    }

    public function register(RegisterUserRequest $request): ?User
    {
        $user = null;

        $validated = collect($request->validated());

        $userData = $validated->except('profile');
        $userData['role'] = isset($userData['role']) ? $this->users::ROLE_EXHIBITOR : $this->users::ROLE_VISITOR;
        $userData['password'] = bcrypt($userData['password']);

        /** @var array $profileData */
        $profileData = $validated['profile'];
        $profileData['gender'] = isset($profileData['gender']) ? $this->profiles::GENDER_MALE : $this->profiles::GENDER_FEMALE;

        try {
            DB::transaction(function () use (&$user, $userData, $profileData) {
                $user = $this->users->create($userData->toArray());
                $user->profile()->save(new $this->profiles($profileData));
            });
        } catch (\Throwable $e) {
        }

        return $user;
    }

    /**
     * @param UpdateUserRequest $request
     * @param User $user
     * @return User
     * @throws Exception
     */
    public function update(UpdateUserRequest $request, User $user): User
    {
        $validated = collect($request->validated());

        $userData = $validated->except('profile');
        $userData['role'] = isset($userData['role']) ? $this->users::ROLE_EXHIBITOR : $this->users::ROLE_VISITOR;

        if($userData['password'] !== null)
            $userData['password'] = bcrypt($userData['password']);
        else
            unset($userData['password']);

        /** @var array $profileData */
        $profileData = $validated['profile'];
        $profileData['gender'] = isset($profileData['gender']) ? $this->profiles::GENDER_MALE : $this->profiles::GENDER_FEMALE;

        try {
            DB::transaction(function () use (&$user, $userData, $profileData) {
                $user->update($userData->toArray());
                $user->profile()->update($profileData);
            });
        } catch (\Throwable $e) {
            throw new Exception(__('errors.whoops'));
        }

        return $user;
    }
}
