<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cadastre_number',
        'size',
        'number_of_plots',
        'user_id'
    ];

    public function user(): void
    {
        $this->belongsTo(User::class,'user_id','id');
    }
    public function plots(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Field::class,'field_id','id');
    }
}
