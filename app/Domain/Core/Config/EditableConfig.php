<?php


namespace App\Domain\Core\Config;


use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Support\Facades\Storage;

class EditableConfig
{
    const CONFIG_PATH = "config/configuration.json";

    /**
     * @param string $key
     * @return array|null
     */
    public static function find(string $key)
    {
        try {
            $segments = explode('.', $key);
            $item = self::all();

            foreach ($segments as $segment)
                $item = $item[$segment];
        } catch (\Exception $e) {
            return null;
        }

        return $item;
    }

    /**
     * @return array
     * @throws FileNotFoundException
     */
    public static function all(): array
    {
        return (array)json_decode(Storage::get(self::CONFIG_PATH));
    }

    /**
     * @param string $key
     * @param $value
     * @return bool
     */
    public static function update(string $key, $value): bool
    {
        try {
            $config = self::all();
            $config[$key] = $value;
            Storage::put(self::CONFIG_PATH, json_encode($config));
        } catch (FileNotFoundException $exception) {
            return false;
        }

        return true;
    }

    /**
     * @return array
     * @throws FileNotFoundException
     */
    public static function keys(): array
    {
        return array_keys(self::all());
    }
}
