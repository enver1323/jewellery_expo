<?php


namespace App\Domain\Stall\UseCases;


use App\Domain\Core\Service;
use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\Entities\StallEquipment;
use App\Domain\Stall\Repositories\StallEquipmentRepository;
use App\Http\Requests\Stall\Equipment\EquipmentSearchRequest;
use App\Http\Requests\Stall\Equipment\EquipmentStoreRequest;
use App\Http\Requests\Stall\Equipment\EquipmentUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StallEquipmentService
 * @package App\Domain\Stall\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property StallEquipment $equipment
 * @property StallEquipmentRepository $equipmentRepo
 */
class StallEquipmentService extends Service
{
    public $equipment;
    public $equipmentRepo;

    public function __construct(StallEquipment $equipment, StallEquipmentRepository $equipmentRepo)
    {
        $this->equipment = $equipment;
        $this->equipmentRepo = $equipmentRepo;
    }

    /**
     * @param EquipmentSearchRequest $request
     * @return Builder
     */
    public function search(EquipmentSearchRequest $request): Builder
    {
        return $this->equipmentRepo->search($request->id, $request->name, $request->price);
    }

    /**
     * @param EquipmentStoreRequest $request
     * @return StallEquipment|Model
     */
    public function create(EquipmentStoreRequest $request)
    {
        return $this->equipment->create($request->validated());
    }

    /**
     * @param EquipmentUpdateRequest $request
     * @param StallEquipment $equipment
     * @return Stall
     */
    public function update(EquipmentUpdateRequest $request, StallEquipment $equipment): StallEquipment
    {
        $equipment->update($request->validated());
        return $equipment;
    }

    /**
     * @param StallEquipment $equipment
     * @return bool
     * @throws Exception
     */
    public function destroy(StallEquipment $equipment): bool
    {
        dd($equipment);
        return $equipment->forceDelete();
    }
}
