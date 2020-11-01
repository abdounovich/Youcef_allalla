<?php

namespace App;

use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function SubCategories()
    {
        return $this->belongsTo(SubCategory::class,'SubCat_id');
    }
  
    
  
  
}
