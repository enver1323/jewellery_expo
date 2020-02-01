<?php


namespace App\Domain\Visa\UseCases;


use App\Domain\Core\Service;
use App\Domain\User\Entities\Profile;
use App\Domain\User\Entities\User;
use App\Domain\Visa\Entities\Visa;
use App\Http\Requests\Visa\VisaDestroyRequest;
use App\Http\Requests\Visa\VisaStoreRequest;
use App\Http\Requests\Visa\VisaUpdateRequest;
use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VisaService
 * @package App\Domain\Visa\UseCases
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property Visa $visas
 * @property Profile $profiles
 */
class VisaService extends Service
{
    private $visas;
    private $profiles;

    public function __construct(Visa $visas, Profile $profiles)
    {
        $this->visas = $visas;
        $this->profiles = $profiles;
    }

    /**
     * @param VisaStoreRequest $request
     * @param User $user
     * @return Visa|Model
     */
    public function create(VisaStoreRequest $request, User $user)
    {
        $data = $request->validated();
        $data['gender'] = isset($data['gender']) ? $this->profiles::GENDER_MALE : $this->profiles::GENDER_FEMALE;

        return $user->visas()->create($data);
    }

    /**
     * @param VisaUpdateRequest $request
     * @param Visa $visa
     * @return Visa
     */
    public function update(VisaUpdateRequest $request, Visa $visa): Visa
    {
        $data = $request->validated();
        $data['gender'] = isset($data['gender']) ? $this->profiles::GENDER_MALE : $this->profiles::GENDER_FEMALE;

        $visa->update($data);
        return $visa;
    }

    /**
     * @param Visa $visa
     * @return bool
     * @throws Exception
     */
    public function destroy(Visa $visa): bool
    {
        return $visa->delete();
    }
}
