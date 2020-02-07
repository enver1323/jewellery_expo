<?php


namespace App\Domain\Stall\Repositories;


use App\Domain\Core\Repository;
use App\Domain\Stall\Entities\StallEquipment;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class StallEquipmentRepository
 * @package App\Domain\Stall\Repositories
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property StallEquipment $equipment
 */
class StallEquipmentRepository extends Repository
{
    private $equipment;

    public function __construct(StallEquipment $equipment)
    {
        $this->equipment = $equipment;
    }

    /**
     * @param int|null $id
     * @param string|null $name
     * @param int|null $price
     * @param null $query
     * @return Builder
     */
    public function search(int $id = null, string $name = null, int $price = null, $query = null): Builder
    {
        $query = $query ?? $this->equipment->newQuery();

        if (isset($id))
            $query = $query->where('id', '=', $id);

        if (isset($name))
            $query = $query->where('name', 'LIKE', "%$name%");

        if (isset($price))
            $query = $query->where('price', '=', $price);

        return $query;
    }
}
