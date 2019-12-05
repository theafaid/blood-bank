<?php

namespace App\Http\Controllers\Api\v1\Categories;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\Posts\PostResource;

class CategoryPostsController extends Controller
{
    /**
     * CategoryPostsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * @param $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Category $category)
    {
        return PostResource::collection($category->posts()->paginate());
    }

    /**
     * @param $category
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function show($category, Post $post)
    {
        return new PostResource($post);
    }

}
