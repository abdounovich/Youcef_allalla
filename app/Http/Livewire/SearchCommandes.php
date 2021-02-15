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
    public $categorie="";
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
$commandes="";
        if($this->categorie=="slug" OR $this->categorie=="type" OR $this->categorie=="total_price"){
        $commandes=Commande::where($this->categorie,'LIKE','%'.$this->query.'%')->paginate(10);}

        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya" ){
           $commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'LIKE', '%'.$this->query.'%');
            })->paginate(10);}
            elseif ($this->categorie=="nom" ){
               $commandes=Commande::whereHas('product', function (Builder $req) {
                    $req->where($this->categorie, 'LIKE', '%'.$this->query.'%');
                })->paginate(10);}


        return view('livewire.search-commandes',["commandes"=>$commandes]);
    }

/* public function mount(){
    $commandes=Commande::paginate(10);
    return view('livewire.search-commandes',["commandes"=>$commandes]);

} */

}
