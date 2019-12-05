<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @var Category
     */
    protected $categories;

    /**
     * CategoryRepository constructor.
     * @param Category $categories
     */
    public function __construct(Category $categories)
    {
        $this->categories = $categories;
    }

    /**
     * @return Category[]|\Illuminate\Database\Eloquent\Collection|mixed
     */
    public function all()
    {
        return $this->categories->all();
    }
}
