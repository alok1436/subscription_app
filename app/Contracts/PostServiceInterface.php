<?php

namespace App\Contracts;
use App\Models\Post;

interface PostServiceInterface
{
    public function store(array $data): Post;
}
