<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'page', 'email', 'phone'];

    public function medicines()
    {
        return $this->hasMany(Medicine::class);
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class);
    }
}
