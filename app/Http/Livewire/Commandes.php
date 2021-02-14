<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;

class Commandes extends Component
{
    public $message="";
    public $commandes="";
    public $query="";
    public function render()
    {
        $this->commandes=Commande::where('slug','ILIKE','%'.$this->query.'%')->get();
        
        return view('livewire.commandes');
    }
    public function mount()
    {
        $this->commandes=Commande::all();
        
        return view('livewire.commandes');
    }


}
