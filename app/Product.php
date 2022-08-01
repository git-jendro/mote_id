<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id', 'name', 'design_meaning', 'slug', 'material_id', 'screen_type_id', 'size_id', 'color_id'
    ];

    public $incrementing = false;

    public function image()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function buyer()
    {
        return $this->hasOne(Buyer::class);
    }

    public function size()
    {
        return $this->belongsTo(Size::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function material()
    {
        return $this->belongsTo(Material::class);
    }

    public function screen()
    {
        return $this->belongsTo(ScreenType::class, 'screen_type_id');
    }
}
