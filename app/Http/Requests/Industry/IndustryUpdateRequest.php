<?php


namespace App\Http\Requests\Industry;


use App\Domain\Core\Config\EditableConfig;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class IndustryUpdateRequest
 * @package App\Http\Requests\Industry
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $name
 * @property integer|null $parent_id
 */
class IndustryUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
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
            'parent_id' => 'numeric|exists:industries,id'
        ];
    }
}
