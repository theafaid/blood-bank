<?php

namespace App\Http\Controllers\Api\v1\Contacts;

use App\Models\Contact;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contacts\ContactStoreRequest;

class ContactController extends Controller
{
    /**
     * ContactController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest:api');
    }

    /**
     * @param ContactStoreRequest $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function __invoke(ContactStoreRequest $request)
    {
        Contact::create($request->validated());

        return response([
            'message' => 'تم ارسال رسالتك الينا بنجاح',
        ]);
    }
}
