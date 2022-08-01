<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScreenType extends Model
{
    public $incrementing = false;

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
