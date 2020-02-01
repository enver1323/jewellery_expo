<?php


namespace App\Http\Requests\Stall;


use App\Domain\Core\Config\EditableConfig;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StallStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number' => ['required', 'string', Rule::notIn((EditableConfig::find('stalls.reserved')))],
            'area' => 'required|numeric',
        ];
    }
}
