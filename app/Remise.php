<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Remise extends Model
{
    public function produit()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
