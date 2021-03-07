<?php

namespace App\Http\Controllers;

use App\Color;
use App\Image;
use App\Taille;
use App\Product;
use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat=Category::all();
        $sub_cat=SubCategory::all();
       return view('products.index')
       ->with('cat',$cat)
       ->with('sub_categories',$sub_cat);
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
    





    public function storeSimple(Request $request)
    {



      

        if ($request->isMethod('post')) 
                 
        {
        $image_name = $request->file('photo')->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $nom=$request->get('nom');
       $photo=$image_url;

       $quantité=$request->get('quantity');
       $prix=$request->get('prix');
       $sub_cat=$request->get('sub_cat');
       $descreption=$request->get('descreption');
       $type="1";
       $product=new Product();
       $image=new Image();
        $image->image=$photo;
       $product->nom=$nom;
       $product->photo=$photo;
       $product->quantity=$quantité;
       $product->prix=$prix;
       $product->SubCat_id=$sub_cat;
       $product->type=$type;
       $product->product_type="simple";
       $product->descreption=$descreption;
       $product->save();
       $image->product_id=$product->id;
       $image->save();
  

        
       return back()->with("success","Produit ajouté avec success");
       


        }
    }






      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeTaille(Request $request)
    {



      

        if ($request->isMethod('post')) 
                 
        {
        $image_name = $request->file('photo')->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $photo=$image_url; 
       $nom=$request->get('nom');
       $quantité=$request->get('quantity');
       $quantité="2";

       $prix=$request->get('prix');
       $sub_cat=$request->get('sub_cat');
       $descreption=$request->get('descreption');
       $type="1";

       $product=new Product();
       $product->nom=$nom;
       $product->photo=$photo;
       $product->quantity=$quantité;
       $product->prix=$prix;
       $product->SubCat_id=$sub_cat;
       $product->type=$type;
       $product->product_type="taille";
       $product->descreption=$descreption;
       $product->save();
       $q="0";
       for ($i=1; $i <=$request->get('Tailleindex') ; $i++) { 
        $taille=new Taille();
        $taille->product_id=$product->id;
        $taille->taille=$request->get('Tbutton'.$i);
        $taille->quantity=$request->get('Qbutton'.$i);
        $q=$q+$taille->quantity;
        $taille->save();
        
     }     

     $product->quantity=$q;
     $product->save();

       return back()->with("success","Produit ajouté avec success");
       


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
       $nom=$request->get('nom');
       $photo=$image_url;

       $quantité=$request->get('quantity');
       $prix=$request->get('prix');
       $sub_cat=$request->get('sub_cat');
       $descreption=$request->get('descreption');
       $type="1";
       $product=new Product();
       $product->nom=$nom;
       $product->photo=$photo;
       $product->quantity="0";
       $product->prix=$prix;
       $product->SubCat_id=$sub_cat;
       $product->type=$type;
       $product->descreption=$descreption;
       $product->product_type="color";
       $product->save();
       $q="0";
       for ($i=1; $i <=$request->get('index') ; $i++) { 
        $color=new Color();
        $color->product_id=$product->id;
        $color->couleur=$request->get('Cbutton'.$i);
        $color->quantity=$request->get('Qbutton'.$i);
        $q=$q+$color->quantity;
        $image_name = $request->file('photo'.$i)->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        $photo=$image_url;
        $color->photo=$photo;
        $color->save();

     }  $product->quantity=$q;
     $product->save();
       return back()->with("success","Produit ajouté avec success");
       }
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComplexeStep1(Request $request)
    { 

        if ($request->isMethod('post')) 
                 
        {
      $image_name = $request->file('photo')->getRealPath();
        Cloudder::upload($image_name, null);
        list($width, $height) = getimagesize($image_name);
        $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
       $photo=$image_url; 
       $id=$request->get('id');
       $product=Product::find($id);
       $couleur=$request->get('nom');
       $product->type="1";
       $color=new Color();
        $color->product_id=$product->id;
        $color->couleur=$couleur;
        $color->quantity="0.1";
        $color->photo=$photo;
        $color->save();
        $q="0";
        for ($i=1; $i <=$request->get('Tailleindex') ; $i++) { 
         $taille=new Taille();
         $taille->product_id=$product->id;
         $taille->color_id=$color->id;
         $taille->taille=$request->get('Tbutton'.$i);
         $taille->quantity=$request->get('Qbutton'.$i);
         $q=$q+$taille->quantity;
         $taille->save();
      }   
  
      $product->save();  

       return back()->with("success","Produit ajouté avec success");
       


        }

    }
    
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComplexe(Request $request)
    {



      

        if ($request->isMethod('post')) 
                 
        {
            $image_name = $request->file('photo')->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
           $photo=$image_url; 
       $nom=$request->get('nom');

       $prix=$request->get('prix');
       $sub_cat=$request->get('sub_cat');
       $descreption=$request->get('descreption');
       $type="0";
       $product=new Product();
       $product->nom=$nom;
       $product->photo=$photo;
       $product->quantity="0.1";
       $product->prix=$prix;
       $product->SubCat_id=$sub_cat;
       $product->type=$type;
       $product->product_type="complexe";
       $product->descreption=$descreption;
       $product->save();
  

        
       return back()->with("success","Produit ajouté avec success");
       


        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    public function edit($id )
    {
        $product=Product::find($id);
        $categories=SubCategory::all();
        
      return view('products.edit')->with("product",$product)->with("categories",$categories);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $product=Product::find($id);

        if ($request->hasFile('photo')) 
                 
        {
$image_name = $request->file('photo')->getRealPath();
Cloudder::upload($image_name, null);
list($width, $height) = getimagesize($image_name);
$image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
$photo=$image_url;
}
else{$photo=$product->photo;}
      $nom=$request->get('nom');
      $quantité=$request->get('quantity');
      $prix=$request->get('prix');
      $sub_cat=$request->get('sub_cat');
      $descreption=$request->get('descreption');
      $type="1";

      $product->nom=$nom;
      $product->photo=$photo;
      $product->quantity=$quantité;
      $product->prix=$prix;
      $product->SubCat_id=$sub_cat;
      $product->type=$type;
      $product->descreption=$descreption;
      $product->save();
      return back()->with("success","Produit modifié avec success");    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=Product::find($id)->delete();
        return back()->with("success","Produit supprimé avec success");    

    }


 /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function steps($step,$id)
    {
        $produit=Product::find($id);
        $cat=Category::all();
        $sub_cat=SubCategory::all();
    return view('products.step0'.$step)
    ->with("produit",$produit)
    ->with('cat',$cat)
    ->with('sub_categories',$sub_cat);
  
   
        }

    
}
