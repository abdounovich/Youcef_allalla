<?php

namespace App\Http\Controllers;

use App\Image;
use App\Product;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
       $product=Product::find($id);
       
       return view('images.add')->with('product',$product);
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexColor($id)
    {
       $product=Color::find($id);
       
       return view('images.color.add')->with('product',$product);
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
        if ($request->isMethod('post')) 
                 
        {
        $image_name = $request->file('photo')->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $photo=$image_url;
       $product_id=$request->get('product_id');
       $image=new Image();
       $image->image=$photo;
       $image->product_id=$product_id;
       $image->save();
  
       return back()->with("success","image ajouté avec success");
       
        }
    }



 /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeColor(Request $request)
    {
        if ($request->isMethod('post')) 
                 
        {
        $image_name = $request->file('photo')->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $photo=$image_url;
       $product_id=$request->get('product_id');
       $image=new Image();
       $image->image=$photo;
       $image->product_id=$product_id;
       $image->save();
  
       return back()->with("success","image ajouté avec success");
       
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $images=Image::where('product_id',$id)->get();
        return view("images.show")->with("images",$images);
    }


   /**
     * Display the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function showColor($id)
    {
        $images=Image::where('product_id',$id)->get();
        return view("images.show")->with("images",$images);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
