<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'product_category', 'description'];

    public function prices()
    {
        return $this->hasMany(Price::class);
    }
}
