<?php

namespace App\Http\Controllers;

use App\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inactive_commandes=Commande::where("type",1)->paginate(10);
        $active_commandes=Commande::where("type",2)->paginate(10);
        $delivré_commandes=Commande::where("type",3)->paginate(10);

        $inactive_commandes_count=Commande::where("type",1)->count();
        $active_commandes_count=Commande::where("type",2)->count();
        $delivré_commandes_count=Commande::where("type",3)->count();


        return view("commandes.index")
        ->with("active_commandes",$active_commandes)
        ->with("inactive_commandes",$inactive_commandes)
        ->with("delivré_commandes",$delivré_commandes)
        ->with("active_commandes_count",$active_commandes_count)
        ->with("inactive_commandes_count",$inactive_commandes_count)
        ->with("delivré_commandes_count",$delivré_commandes_count);
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
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
Commande::find($id)->delete();
return back()->with("success","commande supprimé avec success"); 

    }



    public function confirmation($id)
    {
     
        $commande=Commande::find($id);
        $commande->type="2";
        $commande->save();
        return redirect()->route('commandes');
    }

    
    public function delivration($id)
    {
     
        $commande=Commande::find($id);
        $commande->type="3";
        $commande->save();
        return redirect()->route('commandes');
    }

    public function return($id)
    {
     
        $commande=Commande::find($id);
        $commande->type="1";
        $commande->save();
        return redirect()->route('commandes');
    }
}
