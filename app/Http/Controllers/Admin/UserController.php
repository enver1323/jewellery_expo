<?php


namespace App\Http\Controllers\Admin;


use App\Domain\User\Entities\User;
use App\Domain\User\UseCases\UserService;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UserSearchRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $userService
 */
class UserController extends AdminController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(UserSearchRequest $request): View
    {
        $users = $this->userService->search($request)
            ->orderByDesc('id')
            ->with('profile')
            ->paginate(self::ITEMS_PER_PAGE);

        return $this->render('admin.users.userIndex', [
            'users' => $users,
            'roles' => $this->userService->users::ROLES
        ]);
    }

    /**
     * @param User $user
     * @return View
     */
    public function show(User $user): View
    {
        return $this->render('admin.users.userShow', [
            'user' => $user
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return $this->render('admin.users.userCreate');
    }

    /**
     * @return View
     */
    public function edit(User $user): View
    {
        return $this->render('admin.users.userEdit', [
            'user' => $user
        ]);
    }

    /**
     * @param RegisterUserRequest $request
     * @return RedirectResponse
     */
    public function store(RegisterUserRequest $request): RedirectResponse
    {
        try {
            $user = $this->userService->register($request);
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.users.show', $user)
            ->withErrors(__('messages.success.create', ['item' => __('frontend.profile')]), self::MSG_SUCCESS);
    }

    /**
     * @param UpdateUserRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(UpdateUserRequest $request): RedirectResponse
    {
        try {
            $user = $this->userService->update($request, $request->user());
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors($exception->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.users.show', ['user' => $user])
            ->withErrors(__('messages.success.update', ['item' => __('frontend.profile')]), self::MSG_SUCCESS);
    }

    /**
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user): RedirectResponse
    {
        try {
            $this->userService->destroy($user);
        } catch (\Exception $e) {
            return redirect()->back()
                ->withErrors($e->getMessage(), self::MSG_ERROR);
        }

        return redirect()->route('admin.users.index')
            ->withErrors(__('messages.success.delete', ['item' => __('frontend.profile')]), self::MSG_SUCCESS);
    }
}
