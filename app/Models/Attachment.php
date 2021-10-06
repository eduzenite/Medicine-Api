<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'type'];

    public function medicines()
    {
        return $this->belongsToMany(Medicine::class)->using(MedicineAttachment::class);
    }
}
