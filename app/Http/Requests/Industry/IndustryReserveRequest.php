<?php


namespace App\Http\Requests\Industry;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndustryReserveRequest
 * @package App\Http\Requests\Industry
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property int[] $industries
 */
class IndustryReserveRequest extends FormRequest
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
            'industries' => 'required|array',
            'industries.*' => 'required|numeric|exists:industries,id',
        ];
    }
}
