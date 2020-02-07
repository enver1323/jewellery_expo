<?php


namespace App\Http\Controllers\API;

use App\Domain\Core\Country;
use App\Domain\Industry\UseCases\IndustryService;
use App\Domain\Stall\Entities\StallEquipment;
use App\Domain\Stall\UseCases\StallService;
use App\Domain\User\UseCases\UserService;
use App\Http\Requests\Country\CountrySearchRequest;
use App\Http\Requests\Industry\IndustrySearchRequest;
use App\Http\Requests\Stall\Equipment\EquipmentSearchRequest;
use App\Http\Requests\Stall\StallSearchRequest;
use App\Http\Requests\User\UserSearchRequest;
use App\Http\Resources\CountryResource;
use App\Http\Resources\IndustryResource;
use App\Http\Resources\StallEquipmentResource;
use App\Http\Resources\StallResource;
use App\Http\Resources\UserResource;

/**
 * Class AjaxController
 * @package App\Http\Controllers\API
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $userService
 * @property StallService $stallService
 * @property StallEquipment $stallEquipment
 * @property IndustryService $industryService
 */
class AjaxController extends APIController
{
    const ITEMS_PER_PAGE = 8;
    private $userService;
    private $stallService;
    private $stallEquipment;
    private $industryService;

    public function __construct(StallService $stallService, StallEquipment $stallEquipment, IndustryService $industryService, UserService $userService)
    {
        $this->userService = $userService;
        $this->stallService = $stallService;
        $this->stallEquipment = $stallEquipment;
        $this->industryService = $industryService;
    }

    /**
     * @param CountrySearchRequest $request
     * @return mixed
     */
    public function getCountries(CountrySearchRequest $request)
    {
        try {
            $countries = Country::all();
        } catch (\Throwable $e) {
            return $this->render(null, 500, $e->getMessage());
        }

        $name = strtolower($request->name);

        $countries = $countries->filter(function (Country $item) use ($name) {
            return false !== stripos(strtolower($item->name), $name);
        })->take(self::ITEMS_PER_PAGE);

        return $this->render(CountryResource::collection($countries));
    }

    /**
     * @param StallSearchRequest $request
     * @return mixed
     */
    public function getStalls(StallSearchRequest $request)
    {
        $stalls = $this->stallService->search($request)->free()->get();

        return $this->render(StallResource::collection($stalls));
    }

    /**
     * @param IndustrySearchRequest $request
     * @return mixed
     */
    public function getIndustries(IndustrySearchRequest $request)
    {
        $industries = $this->industryService->search($request)
            ->orderBy('_lft')
            ->withDepth()
            ->paginate(self::ITEMS_PER_PAGE);

        return $this->render(IndustryResource::collection($industries));
    }

    /**
     * @param EquipmentSearchRequest $request
     * @return mixed
     */
    public function getStallEquipment(EquipmentSearchRequest $request)
    {
        $stalls = $this->stallEquipment->get();

        return $this->render(StallEquipmentResource::collection($stalls));
    }

    public function getExhibitors(UserSearchRequest $request)
    {
        $users = $this->userService->search($request)->with('profile')->exhibitors()->get();

        return $this->render(UserResource::collection($users));
    }
}
