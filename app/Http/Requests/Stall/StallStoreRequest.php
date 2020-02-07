<?php


namespace App\Http\Requests\Stall;


use App\Domain\Stall\Entities\Stall;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;

/**
 * Class StallStoreRequest
 * @package App\Http\Requests\Stall
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $name
 * @property string|null $user_id
 * @property integer $floor
 * @property integer $area
 * @property UploadedFile $photo
 */
class StallStoreRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user && ($user->isAdmin() || $user->isExhibitor());
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'area' => 'required|numeric',
            'floor' => 'required|numeric',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:10000',
            'user_id' => 'nullable'
        ];
    }
}
