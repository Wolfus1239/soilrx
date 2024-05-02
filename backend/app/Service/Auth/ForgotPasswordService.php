<?php

namespace App\Service\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Password;

class ForgotPasswordService
{
public function sendResetLink(array $data)
{
    $status = Password::sendResetLink($data);
    if ($status == Password::RESET_LINK_SENT) {
        return [
            'message' => trans($status),
            'status' => __('$status'),
        ];
    }
    throw ValidationException::withMessages([
        'email' => [trans($status)],
    ]);
}
}
