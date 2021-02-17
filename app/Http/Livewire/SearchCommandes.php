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
       $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')
       ->orderBy('created_at', 'desc')->get()
       ->take($this->TakeLimit);

       if ($this->commandes->count()=="0") {
          $this->message="Pas de resultat pour ".$this->query;
       }

/*  
        if($this->categorie=="wilaya") {
            $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where('wilaya', 'ILIKE', '%'.$this->query.'%');
            })->get();

        } elseif($this->categorie=="client") {
            $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where('facebook', 'ILIKE', '%'.$this->query.'%');
            })->get();

        }  
        $commandes=Commande::all()->take($this->TakeLimit);

         if($this->categorie=="slug" OR $this->categorie=="type" OR $this->categorie=="total_price"){
        $commandes=Commande::where($this->categorie,'LIKE','%'.$this->query.'%')->take($this->TakeLimit);}

        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya" ){
           $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'LIKE', '%'.$this->query.'%');
            })->take($this->TakeLimit);}
            elseif ($this->categorie=="nom" ){
               $commandes=Commande::whereHas('product', function (Builder $req) {
                    $req->where($this->categorie, 'LIKE', '%'.$this->query.'%');
                })->take($this->TakeLimit);}
else {}*/
        return view('livewire.search-commandes');
    }

   public function mount(){
    $this->commandes=Commande::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit);
    return view('livewire.search-commandes');

}  
 
}
