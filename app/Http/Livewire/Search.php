<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use WithPagination;


class Search extends Component
{

    public $query="";    
    public $produits="";
    public $message="";

    public function render()
    {
        $this->produits=Product::where('nom','like',"%{$this->query}%")->get();
       if ($this->produits->count()=="0") {
         $this->message="pas de résultat";
       }
       
            return view('livewire.search');

       
    }



    public function mount()
    {
        $this->produits=Product::paginate(5);
        return view('livewire.search');
    }
}
