<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicineDescription extends Model
{
    use HasFactory;
    protected $fillable = ['medicine_id', 'title', 'description'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
