<?php

namespace App\Http\Controllers;

use App\Coli;
use App\Client;
use App\Commande;
use Illuminate\Http\Request;

class ColiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request ,$id )
    {


        $commande=Commande::find($id);
        $client=Client::find($commande->client->id);
        $client->nom=$request->get("familyname");
        $client->prenom=$request->get("firstname");
        $client->save();
        $commande->type="2";
        if ($commande->delivery_type=="Home") {
            $is_stopdesk=false;
        }
        else{
            $is_stopdesk=true; 
        }

        $url = "https://api.yalidine.com/v1/parcels/"; // the parcel's creation endpoint
        $api_id = "58955441267299948423"; // your api ID
        $api_token = "f8GCfYr6yNNE8Exk1vIv34OFSjSoJ7oTRulGDVR52PgcmQ035jKJetdAqet9IhWp"; // your api token
        
        $data =
            array( // the array that contains all the parcels
                array ( // first parcel
                    "order_id"=>$request->get("order_id"),
                    "firstname"=>$request->get("firstname"),
                    "familyname"=>$request->get("familyname"),
                    "contact_phone"=>$request->get("contact_phone"),
                    "address"=>$request->get("address"),
                    "to_commune_name"=>$request->get("to_commune_name"),
                    "to_wilaya_name"=>$request->get("to_wilaya_name"),
                    "product_list"=>$request->get("product_list"),
                    "price"=>$request->get("price"),
                    "freeshipping"=> false,
                    "is_stopdesk"=> $is_stopdesk,
                    "has_exchange"=> 0,
                    "product_to_collect" => null
                ),
              
            );
        
        $postdata = json_encode($data);
        
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                "X-API-ID: ". $api_id,
                "X-API-TOKEN: ". $api_token,
                "Content-Type: application/json"
            )
        );
        
        $result = curl_exec($ch);
        curl_close($ch);
        
        header("Content-Type: application/json");
        $response_array = json_decode($result);
        foreach( $response_array as $item){
            $tracking=$item->tracking;


        }

        $commande->yalidine_TN=$tracking;
        $commande->save();
        return redirect()->route('commandes');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coli  $coli
     * @return \Illuminate\Http\Response
     */
    public function show(Coli $coli)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coli  $coli
     * @return \Illuminate\Http\Response
     */
    public function edit(Coli $coli)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coli  $coli
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coli $coli)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coli  $coli
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coli $coli)
    {
        //
    }
}
