<?php

namespace App\Http\Controllers\Auth\Register;

use App\Http\Requests\RegisterRequest;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\Auth\RegisterService;

class RegisterController extends Controller
{
    public function __construct(
        private readonly RegisterService $register
    ) {}

    public function __invoke(RegisterRequest $request)
    {
        $email = $request->email;

        if (User::where('email', $email)->first()) {
            return response()->json(['error' => 'This user is already registered'], 400);
        }

        $data = $request->validated();

        if ($request->password !== $request->password_confirmation) {
            return response()->json(['message' => 'Password mismatch']);
        }

        $this->register->store($data);

        return response()->json(['message' => 'registration successful']);
    }
}
