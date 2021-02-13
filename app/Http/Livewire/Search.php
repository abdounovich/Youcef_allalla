<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Search extends Component
{
use WithPagination;
    public $query="";    
    public $produits="";
    public $message="";

    public function render()
    {
        $this->produits=Product::where('nom','like',"%{$this->query}%")->get();
       if ($this->produits->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }
       
            return view('livewire.search');

       
    }



    public function mount()
    {



        
        $this->produits=Product::paginate(5);
        return view('livewire.search');
    }
}
