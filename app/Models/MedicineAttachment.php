<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MedicineAttachment extends Pivot
{
    use HasFactory;
    protected $fillable = ['medicine_id', 'attachment_id'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class);
    }
}
