<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
    public function subCat()
    {
        return $this->hasMany('App\SubCategory','cat_id');
    }


 
}
