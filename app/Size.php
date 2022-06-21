<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public $incrementing = false;

    public function product()
    {
        return $this->hasMany(ProductSize::class);
    }
}
