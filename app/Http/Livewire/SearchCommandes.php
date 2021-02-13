<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;

class SearchCommandes extends Component
{ public $message="";
    public $query="";    
    public $commande="";
    public function render()
    {
        $this->inactive_commandes=Commande::where('id','like',"%{$this->query}%")->get();
        if ($this->commande->count()=="0") {
          $this->message="pas de résultat";
        }
        else {
         $this->message="";
 
        }

        return view('livewire.search-commandes');
    }


    public function mount()
    {
        $this->commande=Commande::all();


        return view('livewire.search-commandes');
    }
}
