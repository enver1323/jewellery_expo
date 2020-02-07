<?php


namespace App\Domain\Industry\UseCases;


use App\Domain\Core\Service;
use App\Domain\Industry\Entities\Industry;
use App\Domain\Industry\Repositories\IndustryRepository;
use App\Domain\User\Entities\User;
use App\Http\Requests\Industry\IndustryReserveRequest;
use App\Http\Requests\Industry\IndustrySearchRequest;
use App\Http\Requests\Industry\IndustryStoreRequest;
use App\Http\Requests\Industry\IndustryUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndustryService
 * @package App\Domain\Industry\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Industry $industries
 * @property IndustryRepository $industryRepo
 */
class IndustryService extends Service
{
    public $industries;
    public $industryRepo;

    public function __construct(Industry $industries, IndustryRepository $industryRepo)
    {
        $this->industries = $industries;
        $this->industryRepo = $industryRepo;
    }

    /**
     * @param IndustrySearchRequest $request
     * @return Builder
     */
    public function search(IndustrySearchRequest $request): Builder
    {
        return $this->industryRepo->search($request->id, $request->name);
    }

    /**
     * @param IndustryStoreRequest $request
     * @return Industry|Model
     */
    public function create(IndustryStoreRequest $request)
    {
        return $this->industries->create($request->validated());
    }

    /**
     * @param IndustryUpdateRequest $request
     * @param Industry $industry
     * @return Industry
     */
    public function update(IndustryUpdateRequest $request, Industry $industry): Industry
    {
        $industry->update($request->validated());
        return $industry;
    }

    /**
     * @param IndustryReserveRequest $request
     * @param User $user
     */
    public function reserve(IndustryReserveRequest $request, User $user)
    {
        $user->industries()->sync($request->industries);
    }

    /**
     * @param Industry $industry
     * @return bool
     * @throws Exception
     */
    public function destroy(industry $industry): bool
    {
        return $industry->delete();
    }
}
