<?php


namespace App\Http\Controllers\Web\Cabinet;


use App\Domain\User\UseCases\UserService;
use App\Http\Controllers\Web\WebController;
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
 */
class CabinetController extends WebController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return $this->render('frontend.cabinet.cabinetIndex');
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
