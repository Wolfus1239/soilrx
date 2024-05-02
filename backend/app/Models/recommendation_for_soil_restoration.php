<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommendation_for_soil_restoration extends Model
{
    use HasFactory;

    protected $fillable = [
        'names_of_cultures',
        'plots_id',
    ];
}
