<?php


namespace App\Http\Controllers\Admin;


use App\Domain\Stall\Entities\StallEquipment;
use App\Domain\Stall\UseCases\StallEquipmentService;
use App\Http\Requests\Stall\Equipment\EquipmentSearchRequest;
use App\Http\Requests\Stall\Equipment\EquipmentStoreRequest;
use App\Http\Requests\Stall\Equipment\EquipmentUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class StallEquipmentController
 * @package App\Http\Controllers\Admin
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property StallEquipmentService $equipmentService
 */
class StallEquipmentController extends AdminController
{
    private $equipmentService;

    public function __construct(StallEquipmentService $equipmentService)
    {
        $this->equipmentService = $equipmentService;
    }

    /**
     * @param EquipmentSearchRequest $request
     * @return View
     */
    public function index(EquipmentSearchRequest $request): View
    {
        $equipment = $this->equipmentService->search($request)->paginate(self::ITEMS_PER_PAGE);

        return $this->render("admin.stalls.equipment.equipmentIndex", [
            'equipment' => $equipment
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return $this->render('admin.stalls.equipment.equipmentCreate');
    }

    /**
     * @param StallEquipment $stallEquipment
     * @return View
     */
    public function show(StallEquipment $stallEquipment): View
    {
        return $this->render('admin.stalls.equipment.equipmentShow', [
            'equipment' => $stallEquipment
        ]);
    }

    /**
     * @param StallEquipment $stallEquipment
     * @return View
     */
    public function edit(StallEquipment $stallEquipment): View
    {
        return $this->render('admin.stalls.equipment.equipmentEdit', [
            'equipment' => $stallEquipment
        ]);
    }

    /**
     * @param EquipmentStoreRequest $request
     * @return RedirectResponse
     */
    public function store(EquipmentStoreRequest $request): RedirectResponse
    {
        try {
            $stallEquipment = $this->equipmentService->create($request);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stallEquipment.show', $stallEquipment)
            ->withErrors(__('messages.success.create', ['item' => __('admin.stallEquipment')]), self::MSG_SUCCESS);
    }

    /**
     * @param EquipmentUpdateRequest $request
     * @param StallEquipment $stallEquipment
     * @return RedirectResponse
     */
    public function update(EquipmentUpdateRequest $request, StallEquipment $stallEquipment): RedirectResponse
    {
        try {
            $stallEquipment = $this->equipmentService->update($request, $stallEquipment);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stallEquipment.show', $stallEquipment)
            ->withErrors(__('messages.success.update', ['item' => __('admin.stallEquipment')]), self::MSG_SUCCESS);
    }

    /**
     * @param StallEquipment $stallEquipment
     * @return RedirectResponse
     */
    public function destroy(StallEquipment $stallEquipment): RedirectResponse
    {
        try {
            $this->equipmentService->destroy($stallEquipment);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.stallEquipment.index')
            ->withErrors(__('messages.success.delete', ['item' => __('admin.stallEquipment')]), self::MSG_SUCCESS);
    }
}
