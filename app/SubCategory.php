<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function categories()
    {
        return $this->belongsTo(Category::class,'cat_id');
    }

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
   
}
