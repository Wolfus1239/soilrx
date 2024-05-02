<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Culture extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function plots(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Culture::class,'culture_id','id');
    }
}
