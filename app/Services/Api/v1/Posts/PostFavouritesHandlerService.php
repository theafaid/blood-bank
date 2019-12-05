<?php

namespace App\Services\Api\v1\Posts;

use App\Services\Api\v1\ApiResponse;

class PostFavouritesHandlerService extends ApiResponse
{
    /**
     * @param $post
     * @param null $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function handle($post, $client = null)
    {
        $client = $client ?: auth()->user();

        if(!$post->favouritedBy($client)) {

            $post->favourite($client);

            return $this->respond('تم إضافة هذا المنشور الى قائمة المنشورات المفضلة');
        }

        $post->unfavourite($client);

        return $this->respond('تم حذف هذا المنشور من قائمة المنشورات المفضلة');
    }
}
