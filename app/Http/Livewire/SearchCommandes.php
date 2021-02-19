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
    public $type="";
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
        $this->trierPar='type';
        $this->type=$value;
    }

    
   
    public function render()
    {/* if($this->categorie=="slug"  OR $this->categorie=="total_price"){
        $this->commandes=Commande::where($this->categorie,'ILIKE','%'.$this->query.'%')->where($this->trierPar,$this->type)
        ->get()->take($this->TakeLimit);}

        elseif($this->categorie=="type"){
            $this->commandes=Commande::where($this->trierPar,'LIKE',$this->type)
            ->where($this->categorie,'ILIKE','%'.$this->query.'%')
           ->get()->take($this->TakeLimit);}
    
            
        elseif ($this->categorie=="facebook" OR $this->categorie=="wilaya" ){
           $this->commandes=Commande::whereHas('client', function (Builder $req) {
                $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
            })->get()->take($this->TakeLimit);}
            elseif ($this->categorie=="nom" ){
               $this->commandes=Commande::whereHas('product', function (Builder $req) {
                    $req->where($this->categorie, 'ILIKE', '%'.$this->query.'%');
                })->get()->take($this->TakeLimit);}

               
                else {
                    $this->commandes=Commande::whereType(2)->orderBy('created_at', 'desc')->get()
                    ->take($this->TakeLimit);
                } */
        return view('livewire.search-commandes');
    }

   public function mount(){
    $this->commandes=Commande::all();

    
    return view('livewire.search-commandes');

}  
 
}
