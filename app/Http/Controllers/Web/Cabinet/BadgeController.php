<?php


namespace App\Http\Controllers\Web\Cabinet;


use App\Domain\Badge\Entities\Badge;
use App\Domain\Badge\UseCases\BadgeService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Badge\BadgeDestroyRequest;
use App\Http\Requests\Badge\BadgeStoreRequest;
use App\Http\Requests\Badge\BadgeUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class BadgeController
 * @package App\Http\Controllers\Web\Cabinet
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property BadgeService $badgeService
 */
class BadgeController extends WebController
{
    private $badgeService;

    public function __construct(BadgeService $badgeService)
    {
        $this->badgeService = $badgeService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $user = request()->user();

        return $this->render('frontend.cabinet.badge.badgeIndex', [
            'badges' => $user->badges
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $user = request()->user()->with('profile')->first();

        return $this->render('frontend.cabinet.badge.badgeCreate', [
            'user' => $user
        ]);
    }

    /**
     * @param BadgeStoreRequest $request
     * @return RedirectResponse
     */
    public function store(BadgeStoreRequest $request): RedirectResponse
    {
        try {
            $this->badgeService->create($request, $request->user());
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.badges.index')
            ->withErrors(__('messages.success.create', ['item' => __('frontend.badge')]), self::MSG_SUCCESS);
    }

    public function show(Badge $badge)
    {
        return $this->render('frontend.cabinet.badge.badgeShow', [
            'badge' => $badge
        ]);
    }

    /**
     * @param Badge $badge
     * @return View
     */
    public function edit(Badge $badge): View
    {
        return $this->render('frontend.cabinet.badge.badgeEdit', [
            'badge' => $badge
        ]);
    }

    /**
     * @param BadgeUpdateRequest $request
     * @param Badge $badge
     * @return RedirectResponse
     */
    public function update(BadgeUpdateRequest $request, Badge $badge): RedirectResponse
    {
        try {
            $this->badgeService->update($request, $badge);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.badges.index')
            ->withErrors(__('messages.success.update', ['item' => __('frontend.badge')]), self::MSG_SUCCESS);
    }

    /**
     * @param BadgeDestroyRequest $request
     * @param Badge $badge
     * @return RedirectResponse
     */
    public function destroy(BadgeDestroyRequest $request, Badge $badge): RedirectResponse
    {
        try {
            $this->badgeService->destroy($badge);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.badges.index')
            ->withErrors(__('messages.success.delete', ['item' => __('frontend.badge')]), self::MSG_SUCCESS);
    }
}
