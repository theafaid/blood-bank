<?php

namespace App\Services\Api\v1\Auth;

use Carbon\Carbon;
use App\Models\Client;
use Illuminate\Support\Str;
use App\Models\PasswordReset;
use App\Services\Api\v1\ApiResponse;
use App\Notifications\Auth\PasswordResetSuccess;
use App\Notifications\Auth\PasswordResetRequest;
use App\Http\Resources\Auth\PasswordResetResource;
use App\Http\Resources\Clients\ClientPrivateResource;

class ClientResetPasswordService extends ApiResponse
{
    /**
     * @param $email
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendEmailResetLink($email)
    {
        $passwordReset = $this->createPasswordResetRecord(
            $client = $this->getClientByEmail($email)
        );

        if ($client && $passwordReset) {
            $client->notify(new PasswordResetRequest($passwordReset->token));

            return $this->respond('تم ارسال رسالة اعادة تعيين كلمة المرور الخاصة بك الى بريدك الالكترونى');
        }

        return $this->respondInternalError();
    }

    /**
     * @param $token
     * @return PasswordResetResource|\Illuminate\Http\JsonResponse
     */
    public function findByToken($token)
    {
        if(!$passwordReset = $this->getPasswordResetRecord($token)) {
            return $this->respondNotFound('توكين غير موجودة');
        }

        if ($this->oldPasswordResetRecord($passwordReset)) {
            return $this->handleOldPasswordResetRecord($passwordReset);
        }

        return new PasswordResetResource($passwordReset);
    }

    /**
     * @param $request
     * @return ClientPrivateResource
     */
    public function reset($request)
    {
        $client = $this->getClientByEmail($request['email']);

        $client->update(['password' => $request['password']]);

        return $this->handleRequestAfterReset($client);
    }


    /**
     * @param $email
     * @return mixed
     */
    public function getClientByEmail($email)
    {
        return Client::where('email', $email)->first();
    }

    /**
     * @param $record
     * @return \Illuminate\Http\JsonResponse
     */
    protected function handleOldPasswordResetRecord($record)
    {
        $record->delete();

        return $this->respondNotFound('صلاحية هذا الرابط 12 ساعة فقط');
    }

    /**
     * @param $record
     * @return bool
     */
    protected function oldPasswordResetRecord($record)
    {
        return Carbon::parse($record->updated_at)->addMinutes(720)->isPast();
    }

    /**
     * @param $token
     * @return mixed
     */
    protected function getPasswordResetRecord($token)
    {
        return PasswordReset::where('token', $token)->first();
    }

    /**
     * @param $client
     * @return mixed
     */
    protected function createPasswordResetRecord($client)
    {
        return PasswordReset::updateOrCreate(
            ['email' => $client->email],
            ['email' => $client->email, 'token' => Str::random(60)]
        );
    }

    /**
     * @param $client
     * @return ClientPrivateResource
     */
    protected function handleRequestAfterReset($client)
    {
        $passwordReset = PasswordReset::where('email', $client->email)->delete();

        $client->notify(new PasswordResetSuccess($passwordReset));

        auth()->login($client);

        return new ClientPrivateResource(auth()->user());
    }
}
