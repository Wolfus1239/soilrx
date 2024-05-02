<?php

namespace App\Http\Controllers\Auth\Me;

use App\Http\Controllers\Controller;

class MeController extends Controller
{
    public function me(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'id' => auth()->user()->id,
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);
    }
}
