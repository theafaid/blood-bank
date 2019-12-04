<?php

namespace App\Http\Controllers\Api\v1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Clients\ClientPrivateResource;

class MeController extends Controller
{
    /**
     * MeController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Request $request
     * @return ClientPrivateResource
     */
    public function __invoke(Request $request)
    {
        return new ClientPrivateResource($request->user());
    }
}
