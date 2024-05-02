<?php

namespace App\Http\Controllers\FieldController;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateFieldRequest;
use App\Http\Resources\FieldCollect;
use App\Http\Resources\FieldResource;
use App\Models\Field;
use App\Models\Plot;
use App\Service\Field\FieldService;

class FieldController extends Controller
{
    public function __construct(private readonly FieldService $field)
    {
    }

    public function store(CreateFieldRequest $request): FieldResource
    {
        $data = $request->validated();

        return new FieldResource ($this->field->create($data));
    }

    public function show(Field $field)
    {
        $plots_number=Plot::where('field_id', $field->id)->count();

        //return new FieldResource($field);
        $id = $field->id;
        $name = $field->name;
        $cadastre_number = $field->cadastre_number;
        $size = $field->size;
        return response()->json(['plots_number'=>$plots_number,'id'=>$id,'name'=>$name,'cadastre_number'=>$cadastre_number,'size'=>$size],200);
    }

    public function update(Field $field, CreateFieldRequest $request): FieldResource
    {
        $data = $request->validated();

        return new FieldResource ($this->field->update($field, $data));
    }

    public function destroy(Field $field): \Illuminate\Http\JsonResponse
    {
        $field->delete();

        return response()->json(['message'=>'Deleted'],200);
    }

    public function list()
    {
        $user=auth()->user();

        return new FieldCollect($user->fields);
    }

    public function getPlotsNumber($id)
    {
        $field=Plot::where('field_id', $id)->count();
        return response()->json(['plots_number'=>$field],200);
    }
}
