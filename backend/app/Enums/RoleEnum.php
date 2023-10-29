<?php

namespace App\Enums;
use ArchTech\Enums\Options;
enum RoleEnum : int
{
    use Options;
    case ADMIN = 1;

    case USER = 2;
}
