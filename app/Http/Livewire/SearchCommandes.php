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
        $this->commandes=Commande::where('type','LIKE','%'.$this->query.'%')->get();

        if ($this->commandes->count()=="0") {
            $this->message="pas de résultat";
          }
          else {
           $this->message="";
   
          }
        return view('livewire.search-commandes');
    }


    
}
