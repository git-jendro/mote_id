<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $incrementing = false;

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function buyer()
    {
        return $this->hasMany(Buyer::class);
    }

    public function size()
    {
        return $this->hasMany(ProductSize::class);
    }

    public function color()
    {
        return $this->hasMany(ProductColor::class);
    }
}
