<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $message="";
    public $query="";
    public $commandes="";
    public $categorie="type";
    public $TakeLimit="5";
    public $activation="1";
    protected $paginationTheme = 'bootstrap';

    use WithPagination;

    public function loadMore()
     {   $this->TakeLimit=$this->TakeLimit+5;
       
    
    }
   
   
    public function render()
    {
       /* $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')
       ->orderBy('created_at', 'desc')->get()
       ->take($this->TakeLimit);

       if ($this->commandes->count()=="0") {
          $this->message="Pas de resultat pour ".$this->query;
       }

 
       

         if($this->categorie=="slug" OR $this->categorie=="type" OR $this->categorie=="total_price"){
        $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')->get()->take($this->TakeLimit);}

        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya" ){
           $this->commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
            })->get()->take($this->TakeLimit);}
            elseif ($this->categorie=="nom" ){
               $this->commandes=Commande::whereHas('product', function (Builder $req) {
                    $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
                })->get()->take($this->TakeLimit);} */

        return view('livewire.search-commandes');
    }

   public function mount(){
   /*  $this->commandes=Commande::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit); */

    $this->commandes=Commande::whereHas('product', function (Builder $req) {
        $req->where('nom', 'LIKE', '%'.'taille1'.'%');
    })->get()->take($this->TakeLimit);
    return view('livewire.search-commandes');

}  
 
}
