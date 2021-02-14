<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;

class SearchCommandes extends Component
{
    public $query="";    
    public $commandes="";
    public $message="";

    public function render()
    {
      $this->message="1111";
        return view('livewire.search-commandes');
    }


    
}
