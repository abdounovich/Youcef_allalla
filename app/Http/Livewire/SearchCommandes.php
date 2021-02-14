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
    public $categorie="";
    public function render()
    {
        $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')->get();
      /*   $this->commandes=Commande::where('slug','ILIKE','%'.$this->query.'%')
        ->orWhere('slug','ILIKE','%'.$this->query.'%')
        ->orWhere('type',$this->query)
        ->orWhere('color','ILIKE','%'.$this->query.'%')
        ->orWhere('commande_type','LIKE','%'.$this->query.'%')

        ->orWhere('taille','LIKE','%'.$this->query.'%')

        ->orWhere('total_price','LIKE','%'.$this->query.'%')

->orWhereHas('product', function (Builder $req) {
            $req->where('nom', 'ILIKE', '%'.$this->query.'%');
        })
        ->orWhereHas('client', function (Builder $req1) {
            $req1->where('facebook', 'ILIKE', '%'.$this->query.'%');
        })->get(); */
        
        return view('livewire.search-commandes');
    }
    public function mount()
    {
        $this->commandes=Commande::all();
        
        return view('livewire.search-commandes');
    }


}
