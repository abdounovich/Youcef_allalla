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
    public $total='0';

    public function loadMore()
     {   $this->TakeLimit=$this->TakeLimit*2;
        $this->total=$this->total+$this->TakeLimit;
       
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
        if ( $this->categorie=='product_type') {
             $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->type.'%')->get()->take($this->TakeLimit);

        }
        elseif ( $this->categorie=='all') {
            $this->produits=Product::orderBy('created_at', 'desc')->get();
       }
    
       else{ $this->produits=Product::where($this->categorie,'ILIKE','%'.$this->query.'%')->get()->take($this->TakeLimit);
       }
        
        return view('livewire.search');

    }
   public function mount(){
    $this->produits=Product::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit);
$this->total=$this->TakeLimit;
    
    return view('livewire.search');

}  
 
}
