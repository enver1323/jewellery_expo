<?php


namespace App\Http\Requests\Stall;


use App\Domain\Stall\Entities\Stall;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * Class StallReserveRequest
 * @package App\Http\Requests\Stall
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property array $stalls
 * @property array $equipment
 * @property UploadedFile $photo
 */
class StallReserveRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        $user = $this->user();
        return $user && ($user->isAdmin() || $user->isExhibitor());
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stalls' => ['nullable', 'array', Rule::in(Stall::free()->pluck('id'))],
            'equipment' => 'nullable|array',
            'equipment.*.quantity' => 'required|numeric',
            'equipment.*.stall_equipment_id' => 'required|numeric|exists:stall_equipment,id',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
}
