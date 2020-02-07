<?php


namespace App\Domain\Industry\Repositories;


use App\Domain\Core\Repository;
use App\Domain\Industry\Entities\Industry;
use Illuminate\Database\Eloquent\Builder;

class IndustryRepository extends Repository
{
    private $industries;

    public function __construct(Industry $industries)
    {
        $this->industries = $industries;
    }

    /**
     * @param int|null $id
     * @param string|null $name
     * @param null $query
     * @return Builder
     */
    public function search(int $id = null, string $name = null, $query = null): Builder
    {
        $query = $query ?? $this->industries->newQuery();

        if (isset($id))
            $query = $query->where('id', '=', $id);

        if (isset($name))
            $query = $query->whereEntry('name', 'LIKE', "%$name%");

        return $query;
    }
}
