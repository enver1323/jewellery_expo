<?php


namespace App\Domain\Stall\UseCases;


use App\Domain\Core\Config\EditableConfig;
use App\Domain\Core\Service;
use App\Domain\Stall\Entities\Stall;
use App\Domain\User\Entities\User;
use App\Http\Requests\Stall\StallStoreRequest;
use Illuminate\Contracts\Filesystem\FileNotFoundException;

/**
 * Class StallService
 * @package App\Domain\Stall\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Stall $stalls
 */
class StallService extends Service
{
    private $stalls;

    public function __construct(Stall $stalls)
    {
        $this->stalls = $stalls;
    }

    public function create(StallStoreRequest $request, User $user): Stall
    {

    }

    /**
     * @return array
     */
    public function getFreeStalls(): array
    {
        try {
            $stalls = EditableConfig::find('stalls.reserved');
        } catch (FileNotFoundException $exception) {
            return [];
        }

        $reserved = $this->stalls::pluck('number');
        $reserved = array_merge(...$reserved);

        return array_diff($stalls, $reserved);
    }
}
