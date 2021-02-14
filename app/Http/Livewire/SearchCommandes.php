<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
class SearchCommandes extends Component
{
    use WithPagination;
    public $query="";    
    public $commandes="";
    public $message="";

    public function render()
    {
        $this->commandes=Commande::where('slug','like',"%{$this->query}%")->get();
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
    $this->commandes=Commande::paginate(5);
        return view('livewire.search-commandes');
    }
}
