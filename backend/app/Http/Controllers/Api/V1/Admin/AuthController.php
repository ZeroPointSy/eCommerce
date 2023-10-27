<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Data\UserData;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        public UserService $userService,
    )
    {
    }
    public function login()
    {
        $user = $this->userService->getByCredentials(
            UserData::from(request()->all())
        );
        if (!$user || $user->role_id != RoleEnum::ADMIN->value) {
            return response()->json(
                'Invalid credentials',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $user = $this->userService->grantAuthToken($user);
        return response()->json(
            UserResource::make($user),
            Response::HTTP_OK
        );
    }
}
