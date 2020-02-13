<?php


namespace App\Http\Controllers\Web\Cabinet;



use App\Domain\Core\Config\EditableConfig;
use App\Domain\Stall\UseCases\StallService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\Stall\StallReserveRequest;
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
     * @param StallReserveRequest $request
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(StallReserveRequest $request): RedirectResponse
    {
        try {
            $this->stallService->reserve($request, $request->user());
        } catch (Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('cabinet.stalls.edit')
            ->withErrors(__('messages.success.create', ['item' => __('frontend.stall')]), self::MSG_SUCCESS);
    }

    /**
     * @return View
     */
    public function edit(): View
    {
        $user = request()->user();
        $stalls = $user->stalls;
        $equipment = $user->stallEquipment->map(function($item){
            $item->quantity = $item->pivot->quantity;
            return $item;
        });

        return $this->render('frontend.cabinet.stall.stallEdit', [
            'stalls' => $stalls,
            'equipment' => $equipment,
            'documents' => EditableConfig::find('documents')
        ]);
    }
}
