<?php


namespace App\Http\Requests\Badge;


use App\Domain\Badge\Entities\Badge;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BadgeDestroyRequest
 * @package App\Http\Requests\Badge
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Badge $badge
 */
class BadgeDestroyRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return $this->user()->can('delete', $this->badge);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [];
    }
}
