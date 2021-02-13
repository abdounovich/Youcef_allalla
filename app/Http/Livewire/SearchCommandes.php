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
    {  $this->inactive_commandes=Commande::where("type",1)->paginate(10);
        $this->active_commandes=Commande::where("type",2)->paginate(10);
        $this->delivré_commandes=Commande::where("type",3)->paginate(10);
        $this->enroute_commandes=Commande::where("type",6)->paginate(10);
        $this->annuler_par_admin=Commande::where("type",4)->paginate(10);
        $this->annuler_par_client=Commande::where("type",5)->paginate(10);

        return view('livewire.search-commandes');

    }
}
