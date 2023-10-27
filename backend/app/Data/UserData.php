<?php

namespace App\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    public function __construct(
        public string|Optional $email,
        public string|Optional $phone_number,
        public string|Optional $password,
        public string|Optional $full_name,
    ) {}
}
