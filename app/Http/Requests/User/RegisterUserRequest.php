<?php

namespace App\Http\Requests\User;

use App\Domain\Core\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class RegisterUserRequest
 * @package App\Http\Requests\User
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property integer|null $role
 * @property string $name
 * @property string $email
 * @property string $password
 * @property array $profile
 */
class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'role' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'profile.phone' => 'required|string|max:12',
            'profile.gender' => 'nullable',
            'profile.company' => 'required|string|max:255',
            'profile.position' => 'required|string|max:255',
            'profile.country_code' => ['required', 'string', 'max:255', Rule::in(array_keys(Country::getCountriesList()))],
        ];
    }
}
