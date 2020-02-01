<?php


namespace App\Http\Requests\Country;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class CountrySearchRequest
 * @package App\Http\Requests\Country
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $id
 * @property string $name
 */
class CountrySearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|string|max:2',
            'name' => 'nullable|string|max:255',
        ];
    }
}
