<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $query="";
    public $commandes="";
    public $commandes1="";

    public $commandes2="";

    public $commandes3="";

    public $commandes4="";

    public $commandes5="";
    public $commandes6="";

    public $categorie="";
    public $TakeLimit="5";
    public $activation="1";
    public $type="1";
    public $total='0';
    public $trierPar="";
    protected $listeners = [
        'loadMore' => 'loadMore'
    ];

    public function loadMore()
    {   $this->TakeLimit=$this->TakeLimit*2;
       $this->total=$this->total+$this->TakeLimit;
      
   }
   
    public function change($value){
       
        $this->categorie=$value;
    }

    public function changetype($value){
        
        $this->type=$value;
        
    }

    
   
    public function render()
    {
        $this->commandes1=Commande::whereType("1")->get();
        $this->commandes2=Commande::whereType("2")->get();
        $this->commandes3=Commande::whereType("3")->get();
        $this->commandes4=Commande::whereType("4")->get();
        $this->commandes5=Commande::whereType("5")->get();
        $this->commandes6=Commande::whereType("6")->get();

        if($this->categorie=="slug"  OR $this->categorie=="total_price"){
        $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')
        ->whereType($this->type)->get()->take($this->TakeLimit);}

       
    
            
        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya" ){
           $this->commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
            })->whereType($this->type)->get()->take($this->TakeLimit);}

            elseif ($this->categorie=="nom" ){
               $this->commandes=Commande::whereHas('product', function (Builder $req) {
                    $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
                })->whereType($this->type)->get()->take($this->TakeLimit);}

               
                else {
                    $this->commandes=Commande::whereType($this->type)->get()
                    ->take($this->TakeLimit);
                    
                 }
                
        return view('livewire.search-commandes');
    }

/*    public function mount(){
  

    return view('livewire.search-commandes');

}  */ 

}
