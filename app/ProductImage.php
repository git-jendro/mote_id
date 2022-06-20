<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'id', 'path', 'product_id', 'thumbnail'
    ];

    public $incrementing = false;
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
