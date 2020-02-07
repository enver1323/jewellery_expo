<?php


namespace App\Http\Requests\Stall\Equipment;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EquipmentUpdateRequest
 * @package App\Http\Requests\Stall\Equipment
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $name
 * @property number $price
 */
class EquipmentUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        $user = $this->user();
        return $user && $user->isAdmin();
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'array', /*Rule::in(array_map(function ($item) {
                return $item->code;
            }, EditableConfig::find('languages')))*/],
            'name.*' => 'required|string|max:255',
            'price' => 'required|numeric'
        ];
    }
}
