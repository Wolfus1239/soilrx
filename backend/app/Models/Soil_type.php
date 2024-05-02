<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soil_type extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function plots(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Soil_type::class,'soil_type_id','id');
    }
}
