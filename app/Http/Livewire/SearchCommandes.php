<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;

class SearchCommandes extends Component
{ public $message="";
    public $type;
    public $query;
    public $inactive_commandes;

    public function render()
    {
        $this->inactive_commandes=Commande::where('id','like',"%{$this->query}%")->get();
        if ($this->inactive_commandes->count()=="0") {
          $this->message="pas de résultat";
        }
        else {
         $this->message="";
 
        }
        return view('livewire.search-commandes');
    }


    public function mount()
    {
        $this->inactive_commandes=Commande::all();
        return view('livewire.search-commandes');

    }
}
