<?php

namespace App\Http\Controllers\Api\v1\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Categories\CategoryResource;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
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
        return CategoryResource::collection(
            resolve(CategoryRepositoryInterface::class)->all()
        );
    }
}
