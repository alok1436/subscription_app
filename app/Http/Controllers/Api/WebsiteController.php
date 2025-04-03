<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Api\SubsribeRequest;
use Illuminate\Http\JsonResponse;
use App\Contracts\WebsiteServiceInterface;

class WebsiteController extends Controller
{
    protected $websiteService;

    public function __construct(WebsiteServiceInterface $websiteService)
    {
        $this->websiteService = $websiteService;
    }

    public function get(Request $request): JsonResponse {
        $websites = $this->websiteService->get();
        return response()->json(['success' => true,'data'=>['websites'=>$websites],'message'=>'Websites fetched']);
    }


    public function subscribe(SubsribeRequest $request): JsonResponse {
        try{
            $subsribe = $this->websiteService->subscribe($request->only(['email','website_id']));
            return response()->json(['success'=> true, 'message' => 'Subscribed', 'subscribe'=> $subsribe]);
        }catch(\Exception $e){
            return response()->json(['success'=> false, 'message' => 'Something went wrong'], 400);
        }
    }

}
