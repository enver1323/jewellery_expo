<?php


namespace App\Http\Requests\User;


use App\Domain\Core\Country;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user() != null;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        $id = $this->routeIs("admin.users.*") ? $this->route('user')->id : $this->user()->id;

        return [
            'role' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,$id",
            'password' => 'nullable|string|min:8|confirmed',
            'profile.phone' => 'required|string|max:12',
            'profile.gender' => 'nullable',
            'profile.company' => 'required|string|max:255',
            'profile.position' => 'required|string|max:255',
            'profile.country_code' => ['required', 'string', 'max:255', Rule::in(array_keys(Country::getCountriesList()))],
        ];
    }
}
