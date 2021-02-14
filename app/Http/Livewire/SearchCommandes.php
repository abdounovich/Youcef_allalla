<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
class SearchCommandes extends Component
{
    public $message="";
    public $commandes="";
    public $query="";
    public function render()
    {
        $this->commandes=Commande::where('slug','ILIKE','%'.$this->query.'%')->get();
        
        return view('livewire.search-commandes');
    }
    public function mount()
    {
        $this->commandes=Commande::all();
        
        return view('livewire.search-commandes');
    }


}
