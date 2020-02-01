<?php


namespace App\Domain\Core;


use Exception;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Throwable;

/**
 * Class Country
 * @package App\Domain\Core
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property string $id
 * @property string $name
 */
class Country
{
    const COUNTRIES_JSON_PATH = 'config/countries.json';

    public $id;
    public $name;

    /**
     * Country constructor.
     * @param string $id
     * @param array|null $countries
     * @throws Throwable
     */
    public function __construct(string $id, array $countries = null)
    {
        $countries = $countries ?? self::getCountriesList();

        $this->name = $countries[$id];
        throw_if(empty($this->name), new Exception(__('errors.countryNF')));

        $this->id = $id;
    }

    /**
     * @return array
     */
    public static function getCountriesList(): array
    {
        $countries = [];
        try {
            $countries = (array) json_decode(Storage::get(self::COUNTRIES_JSON_PATH));
        } catch (FileNotFoundException $exception) {
        }

        return $countries;
    }

    /**
     * @return Collection|Country[]
     * @throws Throwable
     */
    public static function all(): Collection
    {
        $all = [];
        $countries = self::getCountriesList();

        foreach ($countries as $id => $name)
            array_push($all, new Country($id, $countries));

        return collect($all);
    }

    /**
     * @param string $code
     * @return bool
     */
    public static function exists(string $code): bool
    {
        return isset(self::getCountriesList()[$code]);
    }
}
