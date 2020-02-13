<?php


namespace App\Http\Requests\Catalogue;


use App\Domain\Core\Config\EditableConfig;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class CatalogueReserveRequest
 * @package App\Http\Requests\Catalogue
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $type
 * @property string $description
 */
class CatalogueReserveRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return isset($user) && ($user->isAdmin() || $user->isExhibitor());
    }

    public function rules()
    {
        $catalogueTypes = collect(EditableConfig::find('catalogues.types'))->map(function($item){
            return $item->name;
        });

        return [
            'type' => ['required', 'string', Rule::in($catalogueTypes)],
            'description' => 'required|string|max:255',
        ];
    }
}
