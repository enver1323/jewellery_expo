<?php


namespace App\Http\Controllers\Web\Cabinet;


use App\Domain\Industry\UseCases\IndustryService;
use App\Domain\User\UseCases\UserService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Industry\IndustryReserveRequest;
use App\Http\Requests\Industry\IndustrySearchRequest;
use App\Http\Requests\User\UpdateUserRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class CabinetController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $userService
 * @property IndustryService $industryService
 */
class CabinetController extends WebController
{
    private $userService;
    private $industryService;

    public function __construct(UserService $userService, IndustryService $industryService)
    {
        $this->userService = $userService;
        $this->industryService = $industryService;
    }

    /**
     * @param IndustrySearchRequest $request
     * @return View
     */
    public function editIndustries(IndustrySearchRequest $request): View
    {
        $industries = $this->industryService->search($request)->orderBy('_lft')->withDepth()->get();
        $preselected = $request->user()->industries()->pluck('industry_id');

        return $this->render('frontend.cabinet.section.sectionEdit', [
            'industries' => $industries,
            'preselected' => $preselected
        ]);
    }

    public function updateIndustries(IndustryReserveRequest $request)
    {
        try {
            $this->industryService->reserve($request, $request->user());
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->back()
            ->withErrors(__('messages.success.update', ['item' => __('frontend.profile')]), self::MSG_SUCCESS);
    }

    /**
     * @return View
     */
    public function editProfile(): View
    {
        $user = request()->user()->with('profile')->first();
        return $this->render('frontend.cabinet.profile.profileEdit', [
            'user' => $user
        ]);
    }

    /**
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(UpdateUserRequest $request): RedirectResponse
    {
        try {
            $user = $this->userService->update($request, $request->user());
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->back()
            ->withErrors(__('messages.success.update', ['item' => __('frontend.profile')]), self::MSG_SUCCESS);
    }
}
