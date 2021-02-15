<?php

namespace App\Http\Livewire;

use App\Client;
use Livewire\Component;
use Livewire\WithPagination;

class SearchClient extends Component
{

    use withPagination;

    public $query="";    
    public $message="";

    public function render()
    {
        $clients=Client::where('facebook','ILIKE','%'.$this->query.'%')
        ->orWhere('wilaya', 'ILIKE', '%' . $this->query . '%')
        ->orWhere('address', 'ILIKE', '%' . $this->query . '%')
        ->orWhere('phone', 'ILIKE', '%' . $this->query . '%')->paginate(10);

       if ($clients->count()=="0") {
         $this->message="pas de résultat";
       }
       else {
        $this->message="";

       }
       
            return view('livewire.search-client',['clients'=>$clients]);

       
    }



    
}
