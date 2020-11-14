<?php

namespace App\Http\Controllers;

use App\Taille;
use Illuminate\Http\Request;

class TailleController extends Controller
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
    public function create($product_id)
    {
        return view('tailles.add')->with('product_id',$product_id);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $taille=new Taille();
        $taille->product_id=$request->get('product_id');
        $taille->taille=$request->get('taille');
        $taille->quantity=$request->get('quantity');
        $taille->save();
        return redirect()->route("products")->with("success","taille ajouter avec success"); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function show(Taille $taille)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
            $taille=Taille::find($id);
            
          return view('tailles.edit')->with("taille",$taille);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
            $taille=Taille::find($id);
    
                 
         
            $taille->taille=$request->get('taille');
            $taille->quantity=$request->get('quantity');
            $taille->product_id=$request->get('product_id');

            $taille->save();
            return back()->with("success","taille modifié avec success");}
       
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Taille  $taille
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $taille=Taille::find($id)->delete();
        return back()->with("success","taille supprimé avec success"); 
    }
}
