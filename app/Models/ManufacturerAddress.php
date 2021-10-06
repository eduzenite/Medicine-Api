<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ManufacturerAddress extends Pivot
{
    use HasFactory;
    protected $fillable = ['manufacturer_id', 'address_id'];
}
