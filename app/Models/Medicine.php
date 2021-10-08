<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = ['active_ingredient_id', 'manufacturer_id', 'name', 'short_name', 'slug'];

    public function active_ingredient()
    {
        return $this->belongsTo(ActiveIngredient::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function attachments()
    {
        return $this->belongsToMany(Attachment::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function descriptions()
    {
        return $this->hasMany(MedicineDescription::class);
    }

    public function metas()
    {
        return $this->hasMany(MedicineMeta::class);
    }
}
