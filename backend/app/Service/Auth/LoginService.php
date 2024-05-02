<?php

namespace App\Service\Auth;

use App\Models\User;

class LoginService
{
    public function login(): \Illuminate\Http\JsonResponse
    {
        $credentials = request(['email', 'password']);
        $user = User::query()->where('email', $credentials['email'])->first();

        if ($user != null) {
            if (!$token = auth()->attempt($credentials)) {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        if ($user['email_verified_at'] == null) {
            return response()->json(['error' => 'Email not verified'], 403);
            }

            return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]);
        } else {
            return response()->json('Not Found', 404);
        }
    }
}
