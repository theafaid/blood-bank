<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Services\Api\v1\Auth\ClientLoginService;
use App\Services\Api\v1\Auth\LoginService;
use App\Http\Requests\Api\v1\Auth\UserLoginRequest;

class LoginController extends Controller
{
    /**
     * @var LoginService
     */
    protected $loginService;

    /**
     * LoginController constructor.
     * @param ClientLoginService $loginService
     */
    public function __construct(ClientLoginService $loginService)
    {
        $this->middleware('guest:api', ['except' => ['logout']]);

        $this->loginService = $loginService;
    }

    /**
     * @param UserLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(UserLoginRequest $request)
    {
        return $this->loginService->handle($request->validated());
    }

    /**
     * @return mixed
     */
    public function logout()
    {
       return auth()->guard('api')->logout();
    }
}
