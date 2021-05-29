<?php

namespace App\Http\Controllers;

use App\Coli;
use App\Color;
use App\Image;
use App\Client;
use App\Remise;
use App\Taille;
use App\Update;
use App\Product;
use App\Category;
use App\Commande;
use App\complexe;
use App\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($table_name)
    {
        $columns = \DB::getSchemaBuilder()->getColumnListing($table_name);
        $model_name = 'App\\' . Str::studly(Str::singular($table_name));           
        $model = app("$model_name");

$data=$model::all();



       return view("updates")
       ->with('columns',$columns)
       ->with("data",$data)
       ->with("table_name",$table_name);
        
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
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$table_name)
    {
        

        $columns = \DB::getSchemaBuilder()->getColumnListing($table_name);
        $model_name = 'App\\' . Str::studly(Str::singular($table_name));           
        $model = app("$model_name");

$data=$model::find($request->get("id"));

foreach ($columns as $column ) {
    if ($column=="id") {
       
    }else{
     
  ${$column}= $request->get("${$column}");}

}


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        //
    }
}
