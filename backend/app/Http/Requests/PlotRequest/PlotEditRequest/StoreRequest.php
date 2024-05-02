<?php

namespace App\Http\Requests\PlotRequest\PlotEditRequest;

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
            'name' => 'required',
            'size' => 'required',
        ];
    }
}
