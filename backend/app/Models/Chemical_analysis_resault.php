<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chemical_analysis_resault extends Model
{
    use HasFactory;

    protected $fillable = [
        'plots_id',
        'potassium_oxide',
        'nitric_oxide',
        'phosphorus_oxide',
        'pH',
        'pdf_path'
    ];

    public function plot(): void
    {
        $this->belongsTo(Plot::class,'plots_id','id');
    }
}
