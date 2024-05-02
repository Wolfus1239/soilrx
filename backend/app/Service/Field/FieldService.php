<?php

namespace App\Service\Field;

use App\Models\Field;

class FieldService
{
    public function create($data): \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Builder
    {
        $data['user_id'] = auth()->user()->id;

        return Field::query()->create($data);
    }

    public function update(Field $field, $data): Field
    {
        $data['user_id'] = auth()->user()->id;
        $field->update($data);

        return $field;
    }
}
