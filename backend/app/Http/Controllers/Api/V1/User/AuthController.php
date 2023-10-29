<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Data\UserData;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\Auth\UserRegisterRequest;
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
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();
        $data['role_id'] = RoleEnum::USER->value;


        $user = $this->userService->store(
            UserData::from($data)
        );
        $user = $this->userService->grantAuthToken($user);
        return response()->json([
            'success' => true,
            'message' => 'registered successfully',
            'data' => UserResource::make($user)
        ],
            Response::HTTP_CREATED
        );
    }
}
