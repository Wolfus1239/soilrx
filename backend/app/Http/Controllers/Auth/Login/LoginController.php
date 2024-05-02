<?php

namespace App\Http\Controllers\Auth\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Service\Auth\LoginService;


class LoginController extends Controller
{
    public function __construct(private readonly LoginService $login,) {
        $this->middleware('auth:api',['except'=>['login']]);
    }
    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        return $this->login->login($data);
    }
}
