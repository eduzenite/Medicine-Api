<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;
    protected $fillable = ['active_ingredient_id', 'manufacturer_id', 'name', 'short_name', 'slug', 'category_id'];

    public function active_ingredient()
    {
        return $this->hasOne(ActiveIngredient::class);
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function categorie()
    {
        return $this->hasOne(Category::class);
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
