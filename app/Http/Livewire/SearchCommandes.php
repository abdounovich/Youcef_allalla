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
        
        return view('livewire.search-commandes');
    }


    public function mount()
    {
        $this->commandes=Commande::find(1);

       
        return view('livewire.search-commandes');
    }
    
}
