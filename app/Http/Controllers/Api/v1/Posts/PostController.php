<?php

namespace App\Http\Controllers\Api\v1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostController extends Controller
{
    /**
     * PostController constructor.
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
        $posts = resolve(PostRepositoryInterface::class);

        if($query = request('q')) {
            return $posts->bySearch($query);
        }

        return PostResource::collection($posts->paginated());
    }
}
