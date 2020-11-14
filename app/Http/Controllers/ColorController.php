<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class ColorController extends Controller
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
       return view('colors.add')->with('product_id',$product_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')) {

        $color=new Color();
        $color->product_id=$request->get('product_id');
        $color->couleur=$request->get('couleur');
        $color->quantity=$request->get('quantity');
        $image_name = $request->file('photo1')->getRealPath();
       
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $photo=$image_url;
        
        $color->photo=$photo;


        }
        $color->save();
        return redirect()->route("products")->with("success","color ajouter avec success"); 

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $color=Color::find($id);
        
      return view('colors.edit')->with("color",$color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->isMethod('post')) {
            $color=Color::find($id);
            $couleur=$request->get('couleur');
            $quantity=$request->get('quantity');

    
                  if ($request->hasFile('photo1'))  {
                $image_name = $request->file('photo1')->getRealPath();
                Cloudder::upload($image_name, null);
                list($width, $height) = getimagesize($image_name);
                $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
                $photo=$image_url;
                }
     else{ 
            $photo=$color->photo;
        }
            $color->couleur=$couleur;
            $color->quantity=$quantity;
            $color->photo=$photo;

            $color->save();
            return back()->with("success","couleur modifié avec success");}
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Color  $color
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $color=Color::find($id)->delete();
        return back()->with("success","color supprimé avec success"); 
    }



}