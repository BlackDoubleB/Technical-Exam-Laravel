<?php

namespace App\DTOs;

class CreatePostDTO
{
    public function __construct(
        public string $title,
        public string $content,
        public int $userId
    ) {}
}