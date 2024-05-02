<?php

namespace App\Http\Requests\Auth\Forgotpassword;

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
            'email' => ['required', 'string', 'email', 'max:255', 'exists:users'],
        ];
    }
}
