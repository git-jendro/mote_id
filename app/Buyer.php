<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public $incrementing = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
