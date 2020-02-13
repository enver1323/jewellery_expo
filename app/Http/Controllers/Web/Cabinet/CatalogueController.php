<?php


namespace App\Http\Controllers\Web\Cabinet;


use App\Domain\Catalogue\UseCases\CatalogueService;
use App\Domain\Core\Config\EditableConfig;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Catalogue\CatalogueReserveRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class CatalogueController extends WebController
{
    private $catalogueService;

    public function __construct(CatalogueService $catalogueService)
    {
        $this->catalogueService = $catalogueService;
    }

    /**
     * @param CatalogueReserveRequest $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function update(CatalogueReserveRequest $request): RedirectResponse
    {
        try {
            $this->catalogueService->reserve($request, $request->user());
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.catalogues.edit')
            ->withErrors(__('messages.success.create', ['item' => __('frontend.catalogue')]), self::MSG_SUCCESS);
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        $user = request()->user();
        $catalogue = $user->catalogue;

        return $this->render('frontend.cabinet.catalogue.catalogueEdit', [
            'catalogue' => $catalogue,
            'types' => EditableConfig::find('catalogues.types')
        ]);
    }

}
