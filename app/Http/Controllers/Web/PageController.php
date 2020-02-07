<?php


namespace App\Http\Controllers\Web;


use App\Domain\Core\Config\EditableConfig;
use App\Domain\Industry\Entities\Industry;
use App\Domain\User\UseCases\UserService;
use App\Http\Requests\User\UserSearchRequest;
use Illuminate\View\View;

/**
 * Class PageController
 * @package App\Http\Controllers\Web
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $users
 * @property Industry $industries
 */
class PageController extends WebController
{
    const ITEMS_PER_PAGE = 10;

    private $users;
    private $industries;

    public function __construct(Industry $industries, UserService $users)
    {
        $this->users = $users;
        $this->industries = $industries;
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
            'documents' => EditableConfig::find('documents')
        ]);
    }

    public function forVisitor(UserSearchRequest $request): View
    {
        $exhibitors = $this->users->search($request)->exhibitors()->with('profile')->paginate(self::ITEMS_PER_PAGE);

        return $this->render('frontend.pages.forVisitor', [
            'exhibitors' => $exhibitors->appends($request->except('page')),
            'documents' => EditableConfig::find('documents')
        ]);
    }
}
