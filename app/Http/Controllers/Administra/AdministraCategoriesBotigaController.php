<?php

namespace App\Http\Controllers\Administra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Categories;
use Illuminate\Routing\Controller as RoutingController;

class AdministraCategoriesBotigaController extends RoutingController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Mostra index inicial.
     *
     */
    public function index()
    {
        $categories = Categories::get();
        return view('administra.categories.index')
        ->with('categories', $categories);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $categories = new Categories();
        $categories->timestamps = false; 
        $categories->nom = $request->ca['nom'];
        $categories->translateOrNew('ca')->nom = $request->ca['nom'];
        $categories->translateOrNew('es')->nom = $request->es['nom'];
        $categories->save();
        $categories = Categories::get();
        return view('administra.categories.index')
        ->with('categories', $categories);
    }
    /**
     * Edita la categoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $categoria = Categories::where('id', $id)->first();
        $categoria->timestamps = false; 
        $categoria->nom = $request->ca['nom'];
        $categoria->translateOrNew('ca')->nom = $request->ca['nom'];
        $categoria->translateOrNew('es')->nom = $request->es['nom'];
        $categoria->save();
        $categories = Categories::get();
        return view('administra.categories.index')
        ->with('categories', $categories);
    }
    /**
     * Actualitza la categoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categories::where('id', $id)->first();
        $categories = Categories::get();
        return view('administra.categories.edita')
        ->with('editdata', $categoria)
        ->with('categories', $categories);
    }
    /**
     * Borra la categoria
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //TODO borrar tambe les translations
        $categoria = Categories::where('id', $id)->delete();
        $categories = Categories::get();
        return view('administra.categories.index')
        ->with('categories', $categories);
    }
}
