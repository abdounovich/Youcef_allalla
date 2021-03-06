<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pending_clients=Client::where("phone","!=","/")->get();
      
        $clients=Client::paginate(10);
        return view("clients.index")
        ->with("clients",$clients)
        ->with("pending_clients",$pending_clients);

        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show( $slug)
    {
       $client=Client::where('slug',$slug)->first();
       return view("clients.show_client_by_slig")->with("client",$client);
    }

  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request ,$id)
    {
     
        $client=Client::find($id);
        $client->nom=$request->get("nom");
        $client->prenom=$request->get("prenom");

        $client->save();
        return back()->with("success","le nom client ajouté avec success");    

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $client=Client::find($id)->delete();
        return back()->with("success","Client supprimé avec success");    

    }
}
