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
        
        return view('livewire.search-commandes');
    }


    public function mount($type)
    {
        $this->type = $type;
        $this->inactive_commandes=Commande::find( $this->type);
        return view('livewire.search-commandes');

    }
}
