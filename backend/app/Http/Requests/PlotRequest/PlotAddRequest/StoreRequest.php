<?php

namespace App\Http\Requests\PlotRequest\PlotAddRequest;

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
            'field_id' => 'required',
            'soil_type_id' => 'required',
            'culture_id' => 'required',
            'pdf' => 'nullable|mimes:pdf',
        ];
    }
}
