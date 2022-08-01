<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    public $incrementing = false;

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
