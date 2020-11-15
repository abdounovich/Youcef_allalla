<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id')->withDefault();;
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }



    
}
