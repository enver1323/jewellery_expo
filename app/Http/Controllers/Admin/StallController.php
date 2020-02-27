<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\UseCases\StallService;
use App\Http\Requests\Stall\StallSearchRequest;
use App\Http\Requests\Stall\StallStoreRequest;
use App\Http\Requests\Stall\StallUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class StallController
 * @package App\Http\Controllers\Admin
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property StallService $stallService
 */
class StallController extends AdminController
{
    private $stallService;

    public function __construct(StallService $stallService)
    {
        $this->stallService = $stallService;
    }

    /**
     * @param StallSearchRequest $request
     * @return View
     */
    public function index(StallSearchRequest $request): View
    {
        $stalls = $this->stallService->search($request)->with(['user', 'user.profile'])->orderByDesc('id')
            ->paginate(self::ITEMS_PER_PAGE);

        return $this->render("admin.stalls.stallIndex", [
            'stalls' => $stalls->appends($request->except('page'))
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return $this->render('admin.stalls.stallCreate');
    }

    /**
     * @param Stall $stall
     * @return View
     */
    public function show(Stall $stall): View
    {
        return $this->render('admin.stalls.stallShow', [
            'stall' => $stall
        ]);
    }
    /**
     * @param stall $stall
     * @return View
     */
    public function edit(stall $stall): View
    {
        return $this->render('admin.stalls.stallEdit', [
            'stall' => $stall
        ]);
    }

    /**
     * @param StallStoreRequest $request
     * @return RedirectResponse
     */
    public function store(StallStoreRequest $request): RedirectResponse
    {
        try {
            $stall = $this->stallService->create($request);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stalls.show', $stall)
            ->withErrors(__('messages.success.create', ['item' => __('admin.stalls')]), self::MSG_SUCCESS);
    }

    /**
     * @param StallUpdateRequest $request
     * @param Stall $stall
     * @return RedirectResponse
     */
    public function update(stallUpdateRequest $request, Stall $stall): RedirectResponse
    {
        try {
            $stall = $this->stallService->update($request, $stall);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stalls.show', $stall)
            ->withErrors(__('messages.success.update', ['item' => __('admin.stalls')]), self::MSG_SUCCESS);
    }

    /**
     * @param Stall $stall
     * @return RedirectResponse
     */
    public function destroy(Stall $stall): RedirectResponse
    {
        try {
            $this->stallService->destroy($stall);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stalls.index')
            ->withErrors(__('messages.success.delete', ['item' => __('admin.stalls')]), self::MSG_SUCCESS);
    }
}
