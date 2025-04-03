<?php

namespace App\Services;
use App\Models\Subscription;
use App\Models\Website;
use App\Contracts\WebsiteServiceInterface;
use Illuminate\Pagination\LengthAwarePaginator;

Class WebsiteService implements WebsiteServiceInterface
{
    public function get(): LengthAwarePaginator
    {
        return Website::orderBy('created_at','desc')->paginate();
    }

    public function subscribe(array $data): Subscription
    {
        return Subscription::create($data);
    }
}
