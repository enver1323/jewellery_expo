<?php

namespace App\Http\Controllers\Auth;

use App\Domain\User\UseCases\UserService;
use App\Http\Controllers\Web\WebController;
use App\Http\Requests\User\RegisterUserRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

/**
 * Class RegisterController
 * @package App\Http\Controllers\Auth
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property UserService $userService
 */
class RegisterController extends WebController
{
    private $userService;

    public function showRegistrationForm()
    {
        return $this->render('auth.register');
    }

    /**
     * RegisterController constructor.
     * @param UserService $userService
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
        $this->middleware('guest');
    }

    public function register(RegisterUserRequest $request)
    {
        event(new Registered($user = $this->userService->register($request)));

        Auth::guard()->login($user);

        return redirect()->route('cabinet.index');
    }
}
