<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthenticateUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthenticateUserController
{
    public function __invoke(AuthenticateUserRequest $request): JsonResponse
    {
        $user = User::where('email', '=', $request->validated('email'))->first();

        if (! $user || ! Hash::check($request->validated('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $device = substr($request->userAgent() ?? '', 0, 255);

        return response()->json([
            'access_token' => $user->createToken($device)->plainTextToken,
        ], 201);
    }
}
