<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $message="";
    public $commandes;
    public $query="قسنطينة";
    public $categorie="type";
    protected $paginationTheme = 'bootstrap';

    use WithPagination;

   
   
   
    public function render()
    {
/*         $commandes=Commande::where($this->categorie,'LIKE','%'.$this->query.'%')->paginate(10);


        if($this->categorie=="wilaya") {
            $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where('wilaya', 'ILIKE', '%'.$this->query.'%');
            })->get();

        } elseif($this->categorie=="client") {
            $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where('facebook', 'ILIKE', '%'.$this->query.'%');
            })->get();

        }  */
        

        if($this->categorie=="slug" OR $this->categorie=="type"){
        $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')
        ->orWhere('slug','LIKE','%'.$this->query.'%')
        ->orWhere('type',$this->query)->get();}

        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya"){
            $this->commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'LIKE', '%'.$this->query.'%');
            })->get();}
           


        return view('livewire.search-commandes');
    }

public function mount(){
    $commandes=Commande::all();
    return view('livewire.search-commandes',["commandes"=>$commandes]);

}

}
