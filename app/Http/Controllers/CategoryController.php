<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $cat=Category::paginate(10);
       return view('categories.index')
       ->with('categories',$cat);
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

        $categorie=new Category();
        $categorie->nom=$nom;
        $categorie->photo=$photo;
        $categorie->save();
        return back()->with("success","Catégorie ajouté avec success");}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $categorie=Category::find($id);
      return view('categories.edit')->with("categorie",$categorie);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)


    {
        
        
        if ($request->isMethod('post')) {
        $categorie=Category::find($id);
        $nom=$request->get('nom');

              if ($request->hasFile('photo'))  {
            $image_name = $request->file('photo')->getRealPath();
            Cloudder::upload($image_name, null);
            list($width, $height) = getimagesize($image_name);
            $image_url= Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height"=>$height]);
            $photo=$image_url;
            }
 else{ 
        $photo=$categorie->photo;
    }
        $categorie->photo=$photo;
        $categorie->nom=$nom;
        $categorie->save();
        return back()->with("success","Catégorie modifié avec success");}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id )
    {
        $categorie=Category::find($id)->delete();
        return back()->with("success","Catégorie supprimé avec success");

    }
}
