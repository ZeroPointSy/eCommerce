<?php

namespace App\Http\Controllers\Api\V1;

use App\Data\UserData;
use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __construct(
        public UserService $userService
    ) {
    }
    public function login(LoginRequest $request)
    {
        $validated = $request->validated();

        $user = $this->userService->getByCredentials(
            UserData::from($validated)
        );
        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials',
            ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }
        $user = $this->userService->grantAuthToken($user);
        return response()->json([
            'success' => true,
            'message' => 'logged in',
            'data' => UserResource::make($user)
        ],
            Response::HTTP_OK
        );
    }
    public function logout()
    {
        $this->userService->revokeCurrentToken(\Auth::user());

        return response()->json([
            'success' => true,
            'message' => 'logged out',
        ],
            Response::HTTP_OK
        );
    }
}
