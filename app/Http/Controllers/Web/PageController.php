<?php


namespace App\Http\Controllers\Web;


use App\Domain\Core\Config\EditableConfig;
use App\Domain\Industry\Entities\Industry;
use App\Domain\Stall\Entities\Stall;
use App\Domain\Stall\Entities\StallEquipment;
use App\Domain\User\Entities\User;
use App\Domain\User\UseCases\UserService;
use App\Http\Requests\User\UserSearchRequest;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;

/**
 * Class PageController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $userService
 * @property Industry $industries
 * @property StallEquipment $equipment
 */
class PageController extends WebController
{
    const ITEMS_PER_PAGE = 10;

    private $userService;
    private $industries;
    private $equipment;

    public function __construct(Industry $industries, UserService $users, StallEquipment $equipment)
    {
        $this->userService = $users;
        $this->industries = $industries;
        $this->equipment = $equipment;
    }

    /**
     * @return View
     */
    public function infoAboutFair(): View
    {
        return $this->render('frontend.pages.fairInfo.aboutFair', [
            'documents' => EditableConfig::find('documents')
        ]);
    }

    /**
     * @return View
     */
    public function infoProductSections(): View
    {
        $industries = $this->industries->orderBy('_lft')->withDepth()->withCount('users')->get();

        return $this->render('frontend.pages.fairInfo.productSections', [
            'industries' => $industries,
        ]);
    }

    public function forExhibitor(): View
    {
        return $this->render('frontend.pages.forExhibitor', [
            'documents' => EditableConfig::find('documents'),
            'equipment' => $this->equipment->all()
        ]);
    }

    public function forVisitor(): View
    {
        return $this->render('frontend.pages.forVisitor.forVisitor', [
            'documents' => EditableConfig::find('documents')
        ]);
    }

    /**
     * @param UserSearchRequest $request
     * @return View
     */
    public function exhibitorList(UserSearchRequest $request): View
    {
        /** @var User|LengthAwarePaginator $exhibitors */
        $exhibitors = $this->userService
            ->search($request)
            ->exhibitors()
            ->orderByDesc('id')
            ->with(['profile', 'stalls'])
            ->paginate(self::ITEMS_PER_PAGE);

        return $this->render('frontend.pages.forVisitor.exhibitorList', [
            'exhibitors' => $exhibitors->appends($request->except('page')),
        ]);
    }
}
