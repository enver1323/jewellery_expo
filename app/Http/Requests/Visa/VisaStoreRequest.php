<?php


namespace App\Http\Requests\Visa;


use Illuminate\Foundation\Http\FormRequest;

class VisaStoreRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'citizenship' => 'required|string|max:255',
            'check_in_at' => 'required|date_format:Y-m-d',
            'check_out_at' => 'required|date_format:Y-m-d',
            'embassy_address' => 'required|string|max:255'
        ];
    }
}
