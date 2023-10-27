<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        public UserService $userService
    ) {
    }

    public function logout()
    {
        $this->userService->revokeCurrentToken(\Auth::user());
        return response()->json(
            'logged out',
            Response::HTTP_OK
        );
    }
}
