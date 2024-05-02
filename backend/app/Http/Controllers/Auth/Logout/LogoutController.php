<?php

namespace App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\Controller;

class LogoutController extends Controller
{

    public function logout(): \Illuminate\Http\JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Выход из аккаунта выполнен успешно'], 200);
    }
}
