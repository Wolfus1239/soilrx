<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Models\Plot;
use App\Models\Field;

class FieldCollect extends ResourceCollection
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {

        $all = Field::all()->pluck('id');
        foreach ($all as $id){
            $field=Plot::where('field_id', $id)->count();
            $field_number = Field::find($id);
            $field_number->number_of_plots = $field;
            $field_number->save();
        }

        return
        [
            'data' => array_map(static fn ($field) => new FieldResource($field), $this->collection->all()),
        ];
    }
}
