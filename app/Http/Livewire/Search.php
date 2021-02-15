<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;
use Livewire\WithPagination;


class Search extends Component
{
use WithPagination;
    public $query="";    
    public $message="";
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
      
       
            return view('livewire.search',["produits"=>Product::where('nom','like',"%{$this->query}%")->paginate(10)
            ]);

       
    }



    
}
