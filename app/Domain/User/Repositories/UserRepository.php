<?php


namespace App\Domain\User\Repositories;


use App\Domain\Core\Repository;
use App\Domain\User\Entities\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class UserRepository
 * @package App\Domain\User\Repositories
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property User $users
 */
class UserRepository extends Repository
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    /**
     * @param int|null $id
     * @param string|null $name
     * @param string|null $email
     * @param string|null $company
     * @param string|null $position
     * @param string|null $countryCode
     * @param string|null $role
     * @param null $query
     * @return Builder
     */
    public function search(int $id = null, string $name = null, string $email = null, string $company = null, string $position = null, string $countryCode = null, string $role = null, $query = null): Builder
    {
        $query = $query ?? $this->users->newQuery();

        if (isset($id))
            $query = $query->where('id', '=', $id);

        if (isset($name))
            $query = $query->where('name', 'LIKE', "%$name%");

        if (isset($email))
            $query = $query->where('email', 'LIKE', "%$email%");

        if (isset($role))
            $query = $query->where('role', '=', $role);

        if (isset($company))
            $query = $query->whereHas('profile', function (Builder $query) use ($company) {
                $query->where('company', 'LIKE', "%$company%");
            });

        if (isset($position))
            $query = $query->whereHas('profile', function (Builder $query) use ($position) {
                $query->where('position', 'LIKE', "%$position%");
            });

        if (isset($countryCode))
            $query = $query->whereHas('profile', function (Builder $query) use ($countryCode) {
                $query->where('country_code', '=', $countryCode);
            });

        return $query;
    }
}
