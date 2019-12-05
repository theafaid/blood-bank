<?php

namespace App\Http\Controllers\Api\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;

class UserFavouritedPostsController extends Controller
{
    /**
     * UserFavouritedPosts constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function __invoke()
    {
        return PostResource::collection(
            auth()->user()->favouritedPosts()->paginate()
        );
    }
}
