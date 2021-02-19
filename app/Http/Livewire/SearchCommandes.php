<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class SearchCommandes extends Component
{
    public $query="";
    public $commandes="";
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
        if ($this->type=="all") {
            $this->commandes=Commande::orderBy('created_at', 'desc')->get()
            ->take($this->TakeLimit);
        
         } 
         else{

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
         }
        return view('livewire.search-commandes');
    }

  /*  public function mount(){
    $this->commandes=Commande::orderBy('created_at', 'desc')->get()
    ->take($this->TakeLimit);

    
    return view('livewire.search-commandes');

}  
  */
}
