<?php


namespace App\Http\Controllers\Web\Cabinet;


use App\Domain\Visa\Entities\Visa;
use App\Domain\Visa\UseCases\VisaService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Visa\VisaDestroyRequest;
use App\Http\Requests\Visa\VisaStoreRequest;
use App\Http\Requests\Visa\VisaUpdateRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class VisaController
 * @package App\Http\Controllers\Web\Cabinet
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property VisaService $visaService
 */
class VisaController extends WebController
{
    private $visaService;

    public function __construct(VisaService $visaService)
    {
        $this->visaService = $visaService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $user = request()->user();

        return $this->render('frontend.cabinet.visa.visaIndex', [
            'visas' => $user->visas
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        $user = request()->user()->with('profile')->first();

        return $this->render('frontend.cabinet.visa.visaCreate', [
            'user' => $user
        ]);
    }

    /**
     * @param VisaStoreRequest $request
     * @return RedirectResponse
     */
    public function store(VisaStoreRequest $request): RedirectResponse
    {
        try {
            $this->visaService->create($request, $request->user());
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.visas.index')
            ->withErrors(__('messages.success.create', ['item' => __('frontend.visa')]), self::MSG_SUCCESS);
    }

    public function show(Visa $visa)
    {
        return $this->render('frontend.cabinet.visa.visaShow', [
            'visa' => $visa
        ]);
    }

    /**
     * @param Visa $visa
     * @return View
     */
    public function edit(Visa $visa): View
    {
        return $this->render('frontend.cabinet.visa.visaEdit', [
            'visa' => $visa
        ]);
    }

    /**
     * @param VisaUpdateRequest $request
     * @param Visa $visa
     * @return RedirectResponse
     */
    public function update(VisaUpdateRequest $request, Visa $visa): RedirectResponse
    {
        try {
            $this->visaService->update($request, $visa);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.visas.index')
            ->withErrors(__('messages.success.update', ['item' => __('frontend.visa')]), self::MSG_SUCCESS);
    }

    /**
     * @param VisaDestroyRequest $request
     * @param Visa $visa
     * @return RedirectResponse
     */
    public function destroy(VisaDestroyRequest $request, visa $visa): RedirectResponse
    {
        try {
            $this->visaService->destroy($visa);
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.visas.index')
            ->withErrors(__('messages.success.delete', ['item' => __('frontend.visa')]), self::MSG_SUCCESS);
    }
}
