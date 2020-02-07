<?php


namespace App\Http\Requests\Stall\Equipment;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class EquipmentSearchRequest
 * @package App\Http\Requests\Stall\Equipment
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 */
class EquipmentSearchRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
            'price' => 'nullable|numeric',
        ];
    }
}
