<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories=Category::all();
        $sub_cat=SubCategory::paginate(10);
        return view('sub_categories.index')
        ->with('categories',$categories)
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
    public function store(Request $request)
    {
        if ($request->isMethod('post')) 
                 
        {
$image_name = $request->file('photo')->getRealPath();
Cloudder::upload($image_name, null);
list($width, $height) = getimagesize($image_name);
$image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        $nom=$request->get('nom');
        $photo=$image_url;
        $categorie=$request->get('cat');

 
        $sub_categorie=new SubCategory();
        $sub_categorie->nom=$nom;
        $sub_categorie->photo=$photo;

        $sub_categorie->cat_id=$categorie;

        $sub_categorie->save();
        return back()->with("success","La sous catégorie est ajoutée avec success");}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
        $sub_categorie=SubCategory::find($id);
        $categories=Category::all();
      return view('sub_categories.edit')->with("sub_categorie",$sub_categorie)->with("categories",$categories);



        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function update(Request $request, $id )
    {

        $sub_categorie=SubCategory::find($id);
        $nom=$request->get('nom');

       if ($request->hasFile('photo'))  {
            $image_name = $request->file('photo')->getRealPath();
           
              
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
        $photo=$image_url;
       }else{
        $photo=$sub_categorie->photo;}
        $categorie=$request->get('cat');

        $sub_categorie->nom=$nom;
        $sub_categorie->photo=$photo;
        $sub_categorie->cat_id=$categorie;
        $sub_categorie->save();
        return back()->with("success","La sous catégorie est modifié avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=SubCategory::find($id)->delete();
        return back()->with("success","Sous categorie supprimé avec success");    

    }
}
