<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Industry\Entities\Industry;
use App\Domain\Industry\UseCases\IndustryService;
use App\Http\Requests\Industry\IndustrySearchRequest;
use App\Http\Requests\Industry\IndustryStoreRequest;
use App\Http\Requests\Industry\IndustryUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class IndustryController
 * @package App\Http\Controllers\Admin
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property IndustryService $industryService
 */
class IndustryController extends AdminController
{
    private $industryService;

    public function __construct(IndustryService $industryService)
    {
        $this->industryService = $industryService;
    }

    /**
     * @param IndustrySearchRequest $request
     * @return View
     */
    public function index(IndustrySearchRequest $request): View
    {
        $industries = $this->industryService->search($request)
            ->withDepth()
            ->orderBy('_lft')
            ->paginate(self::ITEMS_PER_PAGE);

        return $this->render("admin.industries.industryIndex", [
            'industries' => $industries
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return $this->render('admin.industries.industryCreate');
    }

    /**
     * @param Industry $industry
     * @return View
     */
    public function show(Industry $industry): View
    {
        return $this->render('admin.industries.industryShow', [
            'industry' => $industry
        ]);
    }
    /**
     * @param Industry $industry
     * @return View
     */
    public function edit(Industry $industry): View
    {
        return $this->render('admin.industries.industryEdit', [
            'industry' => $industry
        ]);
    }

    /**
     * @param IndustryStoreRequest $request
     * @return RedirectResponse
     */
    public function store(IndustryStoreRequest $request): RedirectResponse
    {
        try {
            $industry = $this->industryService->create($request);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.industries.show', $industry)
            ->withErrors(__('messages.success.create', ['item' => __('admin.industries')]), self::MSG_SUCCESS);
    }

    /**
     * @param IndustryUpdateRequest $request
     * @param Industry $industry
     * @return RedirectResponse
     */
    public function update(IndustryUpdateRequest $request, Industry $industry): RedirectResponse
    {
        try {
            $industry = $this->industryService->update($request, $industry);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.industries.show', $industry)
            ->withErrors(__('messages.success.update', ['item' => __('admin.industries')]), self::MSG_SUCCESS);
    }

    /**
     * @param Industry $industry
     * @return RedirectResponse
     */
    public function destroy(Industry $industry): RedirectResponse
    {
        try {
            $this->industryService->destroy($industry);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.industries.index')
            ->withErrors(__('messages.success.delete', ['item' => __('admin.industries')]), self::MSG_SUCCESS);
    }
}
