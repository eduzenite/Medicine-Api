<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActiveIngredient extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class);
    }
}
