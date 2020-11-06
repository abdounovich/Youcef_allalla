<?php

namespace App\Http\Controllers;

use App\Remise;
use App\Product;
use Illuminate\Http\Request;

class RemiseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $remises=Remise::paginate(10);
        return view('remises.index')
        ->with('products',$products)
        ->with('remises',$remises);
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
        $prix=$request->get('prix');
        $produit=$request->get('produit');

 
        $remise=new Remise();
        $remise->prix=$prix;
        $remise->product_id=$produit;
        $remise->save();
        return back()->with("success","La sous catégorie est ajoutée avec success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Remise  $remise
     * @return \Illuminate\Http\Response
     */
    public function show(Remise $remise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Remise  $remise
     * @return \Illuminate\Http\Response
     */
    public function edit(Remise $remise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Remise  $remise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Remise $remise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Remise  $remise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Remise $remise)
    {
        //
    }
}
