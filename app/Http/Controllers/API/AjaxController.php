<?php


namespace App\Http\Controllers\API;

use App\Domain\Core\Country;
use App\Http\Requests\Country\CountrySearchRequest;
use App\Http\Resources\CountryResource;

class AjaxController extends APIController
{
    const ITEMS_PER_PAGE = 8;

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

//    /**
//     * @param LanguageSearchRequest $request
//     * @return mixed
//     */
//    public function getLanguages(LanguageSearchRequest $request)
//    {
//        $languages = LanguageReadRepository::getSearchQuery($request->code, $request->name)->get();
//
//        return $this->render(LanguageResource::collection($languages));
//    }
}
