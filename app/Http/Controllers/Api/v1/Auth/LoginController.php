<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
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
     * @param LoginService $loginService
     */
    public function __construct(LoginService $loginService)
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

    public function logout()
    {
        dd(auth()->guard('api')->user());

        auth()->guard('api')->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
