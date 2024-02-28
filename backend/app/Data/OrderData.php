<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class OrderData extends Data
{
    public function __construct(
        public int|Optional $user_id,
        public string|Optional $date,
        public float|Optional $total_price
    ) {}
}
