<?php

namespace App\Data;

use PhpOption\Option;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class CategoryData extends Data
{
    public function __construct(
        public int|Optional $id,
        public string|Optional $name,
        public string|Optional $description,
    ) {}
}
