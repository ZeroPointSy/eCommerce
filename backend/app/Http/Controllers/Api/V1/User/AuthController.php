<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Data\UserData;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\UserService;
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
        if (!$user || $user->role_id != RoleEnum::USER->value) {
            return response()->json(
                'Invalid',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $user = $this->userService->grantAuthToken($user);
        return response()->json(
            UserResource::make($user),
            Response::HTTP_OK
        );
    }

    public function register()
    {
        $data = request()->all();
        $data->role_id = RoleEnum::USER->value;

        $user = $this->userService->store(
            UserData::from($data)
        );
        $user = $this->userService->grantAuthToken($user);
        return response()->json(
            UserResource::make($user),
            Response::HTTP_CREATED
        );
    }
}
