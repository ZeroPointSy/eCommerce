<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Services\UploadFileService;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request)
    {
        $validated = $request->validated();

        $user = auth('user')->user();

        $user->update($validated);

        if (request()->has('file')) {
            (new UploadFileService())->uploadFile($user, request()->file, 'user_file');
        }

        return response()->json([
            'success' => true,
            'message' => 'registered successfully',
            'data' => UserResource::make($user)
        ]);
    }
    public function initialData()
    {
        $user = auth('user')->user();

        return response()->json([
            'success' => true,
            'message' => '',
            'data' => UserResource::make($user)
        ]);
    }
}
