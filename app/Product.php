<?php

namespace App;

use App\Taille;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


   

    protected $fillable = [
        'nom',
        'prix',
        'photo',
        'taille',
        'quantité',
        'sub_cat',
        'descreption',
        'type',
    ];
    public $timestamps = false;
    protected $casts=[

        'taille'=>'array'
    ];
    public function SubCategories()
    {
        return $this->belongsTo(SubCategory::class,'SubCat_id');
    }

   
    public function taille()
    {

        return $this->hasMany(Taille::class);
    }
    
    public function color()
    {

        return $this->hasMany(Color::class);
    }
  
}
