<?php


namespace App\Http\Requests\Badge;


use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BadgeStoreRequest
 * @package App\Http\Requests\Badge
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $name
 * @property string $position
 */
class BadgeStoreRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255'
        ];
    }
}
