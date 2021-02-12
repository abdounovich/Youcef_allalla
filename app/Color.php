<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function taille()
    {
        return $this->hasMany(Taille::class,'color_id');
    }


}
