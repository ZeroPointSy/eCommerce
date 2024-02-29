<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class ProductData extends Data
{
    public function __construct(

        public int|Optional $id,
        public string|Optional $name,
        public string|Optional $description,
        public string|Optional $price,
        public string|Optional $stock_quantity,
    ) {}
}
