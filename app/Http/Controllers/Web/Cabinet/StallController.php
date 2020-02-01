<?php


namespace App\Http\Controllers\Web\Cabinet;



use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\UseCases\StallService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Stall\StallStoreRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class StallController
 * @package App\Http\Controllers\Web\Cabinet
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property StallService $stallService
 */
class StallController extends WebController
{
    private $stallService;

    public function __construct(StallService $stallService)
    {
        $this->stallService = $stallService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $user = request()->user();

        return $this->render('frontend.cabinet.stall.stallIndex', [
            'stalls' => $user->stalls,
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $user = request()->user();

        return $this->render('frontend.cabinet.stall.stallCreate', [
            'user' => $user,
            'freeStalls' => $this->stallService->getFreeStalls()
        ]);
    }

    /**
     * @param StallStoreRequest $request
     * @return RedirectResponse
     */
    public function store(stallStoreRequest $request): RedirectResponse
    {
        try {
            $this->stallService->create($request, $request->user());
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.stalls.index')
            ->withErrors(__('messages.success.create', ['item' => __('frontend.stall')]), self::MSG_SUCCESS);
    }

    public function show(Stall $stall)
    {
        return $this->render('frontend.cabinet.stall.stallShow', [
            'stall' => $stall
        ]);
    }

    /**
     * @param stall $stall
     * @return View
     */
    public function edit(stall $stall): View
    {
        return $this->render('frontend.cabinet.stall.stallEdit', [
            'stall' => $stall
        ]);
    }

    /**
     * @param stallUpdateRequest $request
     * @param stall $stall
     * @return RedirectResponse
     */
    public function update(stallUpdateRequest $request, stall $stall): RedirectResponse
    {
        try {
            $this->stallService->update($request, $stall);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.stalls.index')
            ->withErrors(__('messages.success.update', ['item' => __('frontend.stall')]), self::MSG_SUCCESS);
    }

    /**
     * @param stallDestroyRequest $request
     * @param stall $stall
     * @return RedirectResponse
     */
    public function destroy(stallDestroyRequest $request, stall $stall): RedirectResponse
    {
        try {
            $this->stallService->destroy($stall);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.stalls.index')
            ->withErrors(__('messages.success.delete', ['item' => __('frontend.stall')]), self::MSG_SUCCESS);
    }
}
