<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;

    protected $fillable = [
        'field_id',
        'name',
        'size',
        'soil_type_id',
        'culture_id'
    ];
/* Все что закоментированно ниже это отношения между моделями (сущностями), которых еще нет в ветке dev.
   При написании новой сущности не забудь раскомментировать нужную связь */
//    public function recommendationOfCulture(): \Illuminate\Database\Eloquent\Relations\HasMany
//    {
//        return $this->hasMany(Plot::class,'plots_id','id');
//    }
//
    public function chemicalAnalysisResault(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Plot::class,'plots_id','id');
    }

    public function recommendationForSoilRestoration(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Plot::class,'plots_id','id');
    }

    public function field(): void
    {
        $this->belongsTo(Field::class,'field_id','id');
    }

    public function soilTypes(): void
    {
        $this->belongsTo(Soil_type::class,'soil_type_id','id');
    }

    public function culture(): void
    {
        $this->belongsTo(Culture::class,'culture_id','id');
    }

}

