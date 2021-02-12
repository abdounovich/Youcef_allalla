<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taille extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function color()
    {
        return $this->belongsTo(Color::class,'color_id');
    }
}
