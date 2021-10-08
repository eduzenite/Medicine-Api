<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['zipcode', 'country', 'state', 'city', 'district', 'address', 'number', 'complement'];

    public function manufacturer()
    {
        return $this->belongsToMany(Manufacturer::class);
    }
}
