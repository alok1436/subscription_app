<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\WebsiteController;


Route::get('/websites', [WebsiteController::class, 'get']);
Route::post('/subscribe', [WebsiteController::class, 'subscribe']);


Route::post('/posts/{website_id}', [PostController::class, 'store']);
