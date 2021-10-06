<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'description', 'causes', 'symptoms'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->using(MedicineCategory::class);
    }
}
