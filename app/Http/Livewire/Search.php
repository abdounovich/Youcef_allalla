<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;


class Search extends Component
{
    public $query="";
    public $produits="";
    public $categorie="nom";
    public $TakeLimit="2";
    public $activation="1";
    public $type="";

    public function loadMore()
     {   $this->TakeLimit=$this->TakeLimit*2;
       
    }
   
    public function change($value){
        $this->categorie=$value;
    }

    public function changetype($value){
        $this->categorie='product_type';
        $this->type=$value;
    }

    
   
    public function render()
    { 
        $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->type.'%')->get()->take($this->TakeLimit);

        if ( $this->categorie=='product_type') {
             $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->type.'%')->get()->take($this->TakeLimit);

        }elseif($this->categorie=='all'){

            $this->produits=Product::orderBy('created_at', 'desc')->get()
            ->take($this->TakeLimit);
        }
    
       
        
        return view('livewire.search');

    }
   public function mount(){
    $this->produits=Product::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit);

    
    return view('livewire.search');

}  
 
}
