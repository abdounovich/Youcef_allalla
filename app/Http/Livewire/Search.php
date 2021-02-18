<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;


class Search extends Component
{
    public $query="";
    public $produits="";
    public $categorie="";
    public $TakeLimit="5";
    public $activation="1";
    public $type="";

    public function loadMore()
     {   $this->TakeLimit=$this->TakeLimit+5;
       
    }
   
    public function change($value){
        $this->categorie=$value;
    }

    public function changetype($value){
        $this->categorie='type';
        $this->type=$value;
    }

    
   
    public function render()
    { $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->query.'%')->get()->take($this->TakeLimit);
        if ( $this->categorie=='type') {
             $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->type.'%')->get()->take($this->TakeLimit);

        }
        else {
            $this->produits=Product::all()
            ->take($this->TakeLimit);
        }
    }
   public function mount(){
    $this->produits=Product::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit);

    
    return view('livewire.search');

}  
 
}
