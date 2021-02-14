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
        $this->commandes=Commande::where('type','ILIKE','%'.$this->query.'%')->get();

        if ($this->commandes->count()=="0") {
            $this->message="pas de résultat";
          }
          else {
           $this->message="";
   
          }
        return view('livewire.search-commandes');
    }


    public function mount()
    {

        $this->commandes=Commande::whereType(1)->get();

      
        return view('livewire.search-commandes');
    }
}
