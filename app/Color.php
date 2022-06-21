<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public $incrementing = false;

    public function product()
    {
        return $this->hasMany(ProductColor::class);
    }
}
