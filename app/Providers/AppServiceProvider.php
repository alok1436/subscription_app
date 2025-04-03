<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\PostServiceInterface;
use App\Services\PostService;

use App\Contracts\WebsiteServiceInterface;
use App\Services\WebsiteService;

use Illuminate\Support\Facades\Event;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PostServiceInterface::class, PostService::class);
        $this->app->bind(WebsiteServiceInterface::class, WebsiteService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    
    }
}
