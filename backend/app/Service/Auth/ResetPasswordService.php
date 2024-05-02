<?php

namespace App\Service\Auth;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class ResetPasswordService
{
public function reset(array $request){

    $status = Password::reset($request, function ($user, $password) {
        $user->password = Hash::make($password);
        $user->setRememberToken(Str::random(60));
        $user->save();
    });
    if ($status === Password::PASSWORD_RESET) {
        return response()->json(['password' => 'Сброс выполнен успешно'], 200);
    }

    return response()->json(['error' => 'Сброс выполнен не успешно'], 400);

}

}
