<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $message="";
    public $commandes="";
    public $query="";
    public function render()
    {
        $this->commandes=Commande::where('slug','ILIKE','%'.$this->query.'%')
        ->orWhere('slug','ILIKE','%'.$this->query.'%')
        ->orWhere('type','ILIKE','%'.$this->query.'%')
        ->orWhere('color','ILIKE','%'.$this->query.'%')
        ->orWhere('commande_type','ILIKE','%'.$this->query.'%')

        ->orWhere('taille','ILIKE','%'.$this->query.'%')

        ->orWhere('total_price','ILIKE','%'.$this->query.'%')

->orWhereHas('product', function (Builder $req) {
            $req->where('nom', 'ILIKE', '%'.$this->query.'%');
        })->get();
        
        return view('livewire.search-commandes');
    }
    public function mount()
    {
        $this->commandes=Commande::all();
        
        return view('livewire.search-commandes');
    }


}
