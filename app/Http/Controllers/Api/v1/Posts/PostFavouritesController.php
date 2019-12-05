<?php

namespace App\Http\Controllers\Api\v1\Posts;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\Api\v1\Posts\PostFavouritesHandlerService;

class PostFavouritesController extends Controller
{
    /**
     * PostFavouritesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param Post $post
     * @return mixed
     */
    public function __invoke(Post $post)
    {
        return resolve(PostFavouritesHandlerService::class)->handle($post);
    }
}
