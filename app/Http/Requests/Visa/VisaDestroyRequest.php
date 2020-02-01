<?php


namespace App\Http\Requests\Visa;


use App\Domain\Visa\Entities\Visa;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class VisaDestroyRequest
 * @package App\Http\Requests\Visa
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Visa $visa
 */
class VisaDestroyRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('delete', $this->visa);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
