<?php


namespace App\Http\Requests\Industry;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class IndustryDestroyRequest
 * @package App\Http\Requests\Industry
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property
 */
class IndustryDestroyRequest extends FormRequest
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
        return [];
    }
}
