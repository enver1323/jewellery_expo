<?php


namespace App\Domain\Stall\UseCases;


use App\Domain\Core\Service;
use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\Repositories\StallRepository;
use App\Domain\User\Entities\User;
use App\Http\Requests\Stall\StallReserveRequest;
use App\Http\Requests\Stall\StallSearchRequest;
use App\Http\Requests\Stall\StallStoreRequest;
use App\Http\Requests\Stall\StallUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Throwable;

/**
 * Class StallService
 * @package App\Domain\Stall\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Stall $stalls
 * @property StallRepository $stallRepo
 */
class StallService extends Service
{
    public $stalls;
    public $stallRepo;

    public function __construct(stall $stalls, StallRepository $stallRepo)
    {
        $this->stalls = $stalls;
        $this->stallRepo = $stallRepo;
    }

    /**
     * @param StallSearchRequest $request
     * @return Builder
     */
    public function search(StallSearchRequest $request): Builder
    {
        return $this->stallRepo->search($request->id, $request->name, $request->area, $request->floor, $request->user_id);
    }

    /**
     * @param StallStoreRequest $request
     * @return Stall
     */
    public function create(StallStoreRequest $request): Stall
    {
        $stall = null;
        try {
            DB::transaction(function () use (&$stall, $request) {
                $stall = $this->stalls->create($request->input());

                if ($photo = $request->file('photo'))
                    $stall->updatePhoto($photo);
            });
        } catch (Throwable $exception) {
        }

        return $stall;
    }

    /**
     * @param StallUpdateRequest $request
     * @param Stall $stall
     * @return Stall
     */
    public function update(StallUpdateRequest $request, Stall $stall): Stall
    {
        try {
            DB::transaction(function () use (&$stall, $request) {
                $stall->update($request->validated());

                if ($photo = $request->file('photo'))
                    $stall->updatePhoto($photo);
            });
        } catch (Throwable $exception) {
        }

        return $stall;
    }

    /**
     * @param Stall $stall
     * @return bool
     * @throws Exception
     */
    public function destroy(stall $stall): bool
    {
        return $stall->delete();
    }

    /**
     * @param StallReserveRequest $request
     * @param User $user
     * @throws Throwable
     */
    public function reserve(StallReserveRequest $request, User $user): void
    {
        try {
            DB::transaction(function () use ($user, $request) {
                $user->stalls()->update([
                    'user_id' => null,
                ]);
                $stalls = $this->stalls->whereIn('id', $request->stalls);
                $stalls->update([
                    'user_id' => $user->id
                ]);
                $user->stallEquipment()->attach($request->equipment);

                if ($photo = $request->file('photo'))
                    $stalls->first()->updatePhoto($photo);
            });
        } catch (Exception $exception) {
            throw new Exception(__('errors.whoops'));
        }
    }
}
