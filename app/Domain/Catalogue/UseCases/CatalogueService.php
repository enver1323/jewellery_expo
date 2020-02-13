<?php


namespace App\Domain\Catalogue\UseCases;


use App\Domain\Catalogue\Entities\Catalogue;
use App\Domain\Core\Service;
use App\Domain\User\Entities\User;
use App\Http\Requests\Catalogue\CatalogueReserveRequest;

/**
 * Class CatalogueService
 * @package App\Domain\Catalogue\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Catalogue $catalogues
 */
class CatalogueService extends Service
{
    private $catalogues;

    public function __construct(Catalogue $catalogues)
    {
        $this->catalogues = $catalogues;
    }

    /**
     * @param CatalogueReserveRequest $request
     * @param User $user
     * @return Catalogue
     */
    public function reserve(CatalogueReserveRequest $request, User $user): Catalogue
    {
        if (isset($user->catalogue))
            $user->catalogue()->update($request->validated());
        else
            $user->catalogue()->create($request->validated());

        return $user->catalogue;
    }
}
