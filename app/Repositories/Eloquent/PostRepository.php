<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    /**
     * @var Post
     */
    protected $posts;

    /**
     * PostRepository constructor.
     * @param Post $posts
     */
    public function __construct(Post $posts)
    {
        $this->posts = $posts;
    }

    /**
     * @param $name
     * @param $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        return $this->posts->{$name}($arguments[0]);
    }

    /**
     * @param $query
     * @param int $limit
     * @return mixed
     */
    public function bySearch($query, $limit = 15)
    {
        return $this->posts
            ->where('title', 'LIKE', '%' . $query . '%')
            ->orWhere('body', 'Like', '%' . $query . '%')
            ->paginate($limit);
    }
}
