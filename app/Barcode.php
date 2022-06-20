<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    public $incrementing = false;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
