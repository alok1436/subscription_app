<?php

namespace App\Http\Controllers\Api;

use App\Events\PostEvent;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PostRequest;
use App\Contracts\PostServiceInterface;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    public function store(PostRequest $request, $website_id): JsonResponse {
        try{
            $website = Website::find($website_id);

            if(!$website) {
                return response()->json(['success'=> false, 'message' => 'Website not found']);
            }

            $request->merge(['website_id' => $website_id]);
            $post = $this->postService->store($request->only(['title','description','website_id']));

            return response()->json(['success'=> true, 'message' => 'Post created.','post'=>$post], 201);

        }catch(\Exception $e){
            return response()->json(['success'=> false, 'message' => 'Something went wrong'], 400);
        }
    }
}
