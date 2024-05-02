<?php

namespace App\Http\Requests\Auth\ResetPassword;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            //rules for user model
            'token' => 'required',
            'email' => 'required','max:255','exists:users',
            'password' => 'required|min:6|confirmed',
        ];
    }
}
