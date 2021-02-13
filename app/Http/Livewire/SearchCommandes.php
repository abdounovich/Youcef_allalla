<?php

namespace App\Http\Livewire;

use App\Commande;
use Livewire\Component;

class SearchCommandes extends Component
{
    public $query="";    
    public $commandes="";

    public $active_commandes='';


    public $inactive_commandes='';

    public $delivré_commandes='';
    public $enroute_commandes='';
    public $annuler_par_admin='';
    public $annuler_par_client='';
    public $inactive_commandes_count='';
    public $active_commandes_count='';
    public $delivré_commandes_count='';
    public $annuler_par_admin_count='';
    public $annuler_par_client_count='';
    public $enroute_commandes_count='';


    public $message="";
    public function render()
    {
        
        $this->inactive_commandes=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->inactive_commandes->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }


       $this->active_commandes=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->active_commandes->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }


       $this->delivré_commandes=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->delivré_commandes->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }



       $this->enroute_commandes=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->enroute_commandes->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }


       $this->annuler_par_admin=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->annuler_par_admin->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }


       $this->annuler_par_client=Commande::where('id','like',"%{$this->query}%")->get();
       if ($this->annuler_par_client->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }


      

        return view('livewire.search-commandes');
    }

    
    public function mount()
    {

        $inactive_commandes=Commande::where("type",1)->paginate(10);
        $active_commandes=Commande::where("type",2)->paginate(10);
        $delivré_commandes=Commande::where("type",3)->paginate(10);
        $enroute_commandes=Commande::where("type",6)->paginate(10);
        $annuler_par_admin=Commande::where("type",4)->paginate(10);
        $annuler_par_client=Commande::where("type",5)->paginate(10);
        $inactive_commandes_count=Commande::where("type",1)->count();
        $active_commandes_count=Commande::where("type",2)->count();
        $delivré_commandes_count=Commande::where("type",3)->count();
        $annuler_par_admin_count=Commande::where("type",4)->count();
        $annuler_par_client_count=Commande::where("type",5)->count();
        $enroute_commandes_count=Commande::where("type",6)->count();


    
        return view('livewire.search-commandes')
        ->with("active_commandes",$active_commandes)
        ->with("inactive_commandes",$inactive_commandes)
        ->with("enroute_commandes",$enroute_commandes)
        ->with("delivré_commandes",$delivré_commandes)
        ->with("annuler_par_admin",$annuler_par_admin)
        ->with("annuler_par_client",$annuler_par_client)
        
        ->with("active_commandes_count",$active_commandes_count)
        ->with("enroute_commandes_count",$enroute_commandes_count)
        ->with("inactive_commandes_count",$inactive_commandes_count)
        ->with("inactive_commandes_count",$inactive_commandes_count)
        ->with("delivré_commandes_count",$delivré_commandes_count)
        ->with("annuler_par_admin_count",$annuler_par_admin_count)
        ->with("annuler_par_client_count",$annuler_par_client_count);
        }
}
