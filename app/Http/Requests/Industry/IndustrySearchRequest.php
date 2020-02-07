<?php


namespace App\Http\Requests\Industry;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndustrySearchRequest
 * @package App\Http\Requests\Industry
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer $id
 * @property string $name
 */
class IndustrySearchRequest extends FormRequest
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
            'name' => 'nullable|string|max:255'
        ];
    }
}
