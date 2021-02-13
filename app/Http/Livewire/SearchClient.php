<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;

class SearchClient extends Component
{
    public $query="";    
    public $clients="";
    public $message="";

    public function render()
    {
        $this->clients=Client::where('facebook','ILIKE','%'.$this->query.'%')
        ->orWhere('wilaya', 'ILIKE', '%' . $this->query . '%')
        ->orWhere('address', 'ILIKE', '%' . $this->query . '%')
        ->orWhere('phone', 'ILIKE', '%' . $this->query . '%')->get();

       if ($this->clients->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }
       
            return view('livewire.search-client');

       
    }



    public function mount()
    {



        
        $this->clients=Client::paginate(5);
        return view('livewire.search-client');
    }
}
