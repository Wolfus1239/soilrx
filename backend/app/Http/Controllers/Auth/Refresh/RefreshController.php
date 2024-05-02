<?php

namespace App\Http\Controllers\Auth\Refresh;

use App\Http\Controllers\Controller;

class RefreshController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['refresh']]);
    }

    public function refresh(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'access_token' => auth()->refresh(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
