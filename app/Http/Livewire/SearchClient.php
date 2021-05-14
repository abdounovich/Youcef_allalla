<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClient extends Component
{

  public $query="";
  public $clients="";
  public $categorie="facebook";
  public $TakeLimit="10";
  public $type="";
  protected $listeners = [
      'loadMore' => 'loadMore'
  ];
  public function loadMore()
   {   $this->TakeLimit=$this->TakeLimit+5;
     
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
      
      $this->clients=Client::where($this->categorie,'LIKE','%'.$this->query.'%')->get()->take($this->TakeLimit);
   
      return view('livewire.search-client');

  }
 public function mount(){
  $this->clients=Client::orderBy('created_at', 'desc')->get()
  ->take($this->TakeLimit);
  
  return view('livewire.search-client');

}  

    
}
