<?php


namespace App\Domain\Stall\Repositories;


use App\Domain\Core\Repository;
use App\Domain\Stall\Entities\Stall;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class StallRepository
 * @package App\Domain\Stall\Repositories
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Stall $stalls
 */
class StallRepository extends Repository
{
    private $stalls;

    public function __construct(Stall $stalls)
    {
        $this->stalls = $stalls;
    }

    /**
     * @param int|null $id
     * @param string|null $name
     * @param int|null $area
     * @param int|null $floor
     * @param int|null $user_id
     * @param null $query
     * @return Builder
     */
    public function search(int $id = null, string $name = null, int $area = null, int $floor = null, int $user_id = null, $query = null): Builder
    {
        $query = $query ?? $this->stalls->newQuery();

        if (isset($id))
            $query = $query->where('id', '=', $id);

        if (isset($name))
            $query = $query->where('name', 'LIKE', "%$name%");

        if (isset($area))
            $query = $query->where('area', '=', $area);

        if (isset($floor))
            $query = $query->where('floor', '=', $floor);

        if (isset($user_id))
            $query = $query->where('user_id', '=', $user_id);


        return $query;
    }
}
