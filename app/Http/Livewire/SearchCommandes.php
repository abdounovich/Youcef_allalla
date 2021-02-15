<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $message="";
    public $statue="0";
/*     public $commandes="";
 */    public $query="";
    public $categorie="type";


    public function change($statue,$categorie)
    {
        $this->statue=$statue;
        $this->categorie=$categorie;


    }
    public function render()
    {
       /*  $this->commandes=Commande::where($this->categorie,'LIKE','%'.$this->query.'%')->get();
        $this->commandes=Commande::where('slug','ILIKE','%'.$this->query.'%')
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


        $commandes=Commande::where($this->categorie,'LIKE','%'.$this->query.'%')->paginate(10);


        if ($this->categorie=="client") {
            $commandes=Commande::WhereHas('client', function (Builder $req1) {
                $req1->where('facebook', 'ILIKE', '%'.$this->query.'%');
            })->paginate(10);           
        }
        elseif ($this->categorie=="wilaya") {
            $commandes=Commande::WhereHas('client', function (Builder $req1) {
                $req1->where('wilaya', 'ILIKE', '%'.$this->query.'%');
            })->paginate(10);           
        }
        
        return view('livewire.search-commandes',['commandes'=>$commandes]);
    }
   /*  public function mount()
    {
        $this->commandes=Commande::all();
        
        return view('livewire.search-commandes');
    } */


}
