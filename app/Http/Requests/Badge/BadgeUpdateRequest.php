<?php


namespace App\Http\Requests\Badge;


use App\Domain\Badge\Entities\Badge;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BadgeUpdateRequest
 * @package App\Http\Requests\Badge
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Badge $badge
 */
class BadgeUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('update', $this->badge);
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255'
        ];
    }
}
