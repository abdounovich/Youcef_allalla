<?php

namespace App\Http\Controllers;

use App\Color;
use App\Taille;
use App\Product;
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
        $annuler_par_admin=Commande::where("type",4)->paginate(10);
        $annuler_par_client=Commande::where("type",5)->paginate(10);
        
        $inactive_commandes_count=Commande::where("type",1)->count();
        $active_commandes_count=Commande::where("type",2)->count();
        $delivré_commandes_count=Commande::where("type",3)->count();
        $annuler_par_admin_count=Commande::where("type",4)->count();
        $annuler_par_client_count=Commande::where("type",5)->count();

        return view("commandes.index")
        ->with("active_commandes",$active_commandes)
        ->with("inactive_commandes",$inactive_commandes)
        ->with("delivré_commandes",$delivré_commandes)
        ->with("annuler_par_admin",$annuler_par_admin)
        ->with("annuler_par_client",$delivré_commandes)

        ->with("active_commandes_count",$active_commandes_count)
        ->with("inactive_commandes_count",$inactive_commandes_count)
        ->with("delivré_commandes_count",$delivré_commandes_count)
        ->with("annuler_par_admin_count",$annuler_par_admin_count)
        ->with("annuler_par_client_count",$delivré_commandes_count);
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
    public function annuler($id)
    {

$commande=Commande::find($id);
$commande->type=4;
$commande->save();

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
        
        $commande=Commande::find($id);
        if ($commande->product->product_type=="simple") {

            $produit=Product::find($commande->product->id);
            $produit->quantity=$produit->quantity+1;
            $produit->save();

        }
        elseif ($commande->product->product_type=="taille") {

            $produit=Taille::find($commande->taille);
            $produit->quantity=$produit->quantity+1;
            $produit->save();
        } 
        elseif ($commande->product->product_type=="color") {
            $produit=Color::find($commande->color);
            $produit->quantity=$produit->quantity+1;
            $produit->save();

        } 
        $commande->delete();

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
