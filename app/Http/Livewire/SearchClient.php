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
  public $activation="1";
  public $type="";
  public $total='0';
  protected $listeners = [
      'loadMore' => 'loadMore'
  ];
  public function loadMore()
   {   $this->TakeLimit=$this->TakeLimit+5;
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
           $this->clients=Client::where($this->categorie,'ILIKE','%'.$this->type.'%')->get()->take($this->TakeLimit);

      }
      elseif ( $this->categorie=='all') {
          $this->clients=Client::orderBy('created_at', 'desc')->get();
     }
  
     else{ $this->clients=Client::where($this->categorie,'ILIKE','%'.$this->query.'%')->get()->take($this->TakeLimit);
     }
      
      return view('livewire.search-client');

  }
 public function mount(){
  $this->clients=Client::orderBy('created_at', 'desc')->get()
  ->take($this->TakeLimit);
$this->total=$this->TakeLimit;
  
  return view('livewire.search-client');

}  

    
}
