<?php


namespace App\Http\Requests\Visa;


use App\Domain\Visa\Entities\Visa;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VisaUpdateRequest
 * @package App\Http\Requests\Visa
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Visa $visa
 */
class VisaUpdateRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->visa);
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
