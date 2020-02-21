<?php


namespace App\Http\Requests\Stall;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class StallSearchRequest
 * @package App\Http\Requests\Stall
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property string $name
 * @property integer $user_id
 * @property integer $floor
 * @property integer $area
 */
class StallSearchRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id' => 'nullable|numeric',
            'area' => 'nullable|numeric',
            'name' => 'nullable|string|max:255',
            'floor' => 'nullable|numeric',
            'user_id' => 'nullable|numeric|exists:users,id',
        ];
    }
}
