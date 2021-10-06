<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManufacturerAddress extends Model
{
    use HasFactory;
    protected $fillable = ['manufacturer_id', 'address_id'];
}
