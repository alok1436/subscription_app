<?php

namespace App\Contracts;
use App\Models\Subscription;
use Illuminate\Pagination\LengthAwarePaginator;

interface WebsiteServiceInterface
{
    public function get() : LengthAwarePaginator;

    public function subscribe(array $data): Subscription;
}
