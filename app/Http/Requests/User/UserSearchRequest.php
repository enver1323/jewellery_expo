<?php


namespace App\Http\Requests\User;


use App\Domain\Core\Country;
use App\Domain\User\Entities\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class UserSearchRequest
 * @package App\Http\Requests\User
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer|null $id
 * @property string|null $role
 * @property string|null $name
 * @property string|null $email
 * @property string|null $company
 * @property string|null $position
 * @property string|null $country_code
 */
class UserSearchRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => 'nullable|numeric',
            'role' => ['nullable', 'string', 'max:255', Rule::in(User::ROLES)],
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|string|max:255',
            'company' => 'nullable|string|max:255',
            'position' => 'nullable|string|max:255',
            'country_code' => ['nullable', 'string', 'max:255', Rule::in(array_keys(Country::getCountriesList()))],
        ];
    }
}
