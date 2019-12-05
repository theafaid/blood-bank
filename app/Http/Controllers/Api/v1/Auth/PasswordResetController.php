<?php

namespace App\Http\Controllers\Api\v1\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Api\v1\Auth\ForgotPasswordRequest;
use App\Services\Api\v1\Auth\ClientResetPasswordService;


class PasswordResetController extends Controller
{
    /**
     * @var ClientResetPasswordService
     */
    protected $service;

    /**
     * PasswordResetController constructor.
     * @param ClientResetPasswordService $service
     */
    public function __construct(ClientResetPasswordService $service)
    {
        $this->middleware('guest:api');

        $this->service = $service;
    }

    /**
     * @param ForgotPasswordRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(ForgotPasswordRequest $request)
    {
        return $this->service->sendEmailResetLink($request->email);
    }

    /**
     * Find token password reset
     *
     * @param  [string] $token
     * @return [string] message
     * @return [json] passwordReset object
     */
    public function find($token)
    {
        return $this->service->findByToken($token);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return mixed
     */
    public function reset(ResetPasswordRequest $request)
    {
        return $this->service->reset($request->validated());
    }
}
