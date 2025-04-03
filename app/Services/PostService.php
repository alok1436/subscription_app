<?php

namespace App\Services;
use App\Models\Post;
use App\Contracts\PostServiceInterface;

Class PostService implements PostServiceInterface
{
    public function store(array $data): Post
    {
        return Post::create($data);
    }
}
