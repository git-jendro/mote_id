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

    public function barcode()
    {
        return $this->hasMany(Barcode::class);
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
