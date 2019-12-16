<?php

namespace App\Services\Api\v1\Posts;

use App\Http\Resources\Posts\PostResource;
use App\Services\Api\v1\ApiResponse;

class PostFavouritesHandlerService extends ApiResponse
{
    /**
     * @param $post
     * @param null $client
     * @return PostResource|\Illuminate\Http\JsonResponse
     */
    public function handle($post, $client = null)
    {
        $client = $client ?: auth()->user();

        if($post->favouritedBy($client)) {

            $post->unfavourite($client);
            return $this->respond('تم حذف المنشور من قائمة المفضلة');
        }
        $post->favourite($client);

        return (new PostResource($post))->additional([
            'message' => 'تم إضافة هذا المنشور الى قائمة المنشورات المفضلة',
        ]);
    }
}
