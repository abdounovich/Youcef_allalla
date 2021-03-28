<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }

    public function color()
    {
        return $this->HasOne(Color::class,'color');
    }
    public function taille()
    {
        return $this->hasOne(Taille::class,'taille');
    }




}
