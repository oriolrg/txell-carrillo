<?php

namespace App\Http\Controllers\Administra;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Productes;
use Illuminate\Routing\Controller as RoutingController;

class AdministraProductesBotigaController extends RoutingController
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
        $productes = Productes::get();
        $categories = Categories::get();
        return view('administra.productes.index')
        ->with('categories', $categories)
        ->with('productes', $productes);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $productes = new Productes();
        $productes->timestamps = false; 
        $productes->nom = $request->ca['nom'];
        $productes->translateOrNew('ca')->nom = $request->ca['nom'];
        $productes->translateOrNew('es')->nom = $request->es['nom'];
        $productes->descripcio = $request->ca['descripcio'];
        $productes->translateOrNew('ca')->descripcio = $request->ca['descripcio'];
        $productes->translateOrNew('es')->descripcio = $request->es['descripcio'];
        $productes->preu = $request->preu;
        $productes->quantitat = $request->quantitat;        
        $productes->categoria_id = $request->categoria_id;
        if ($image = $request->file('imatge')) {

            $destinationPath = 'images/productes/';

            $profileImage = $request->ca['nom'] .'.'. $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$destinationPath$profileImage";
            
            $productes->imatge = $input['image'];

        }
        $productes->save();
        $productes = Productes::get();
        $categories = Categories::get();
        return view('administra.productes.index')
        ->with('categories', $categories)
        ->with('productes', $productes);
    }
    /**
     * Edita el producte
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $producte = Productes::where('id', $id)->first();
        $producte->timestamps = false; 
        $producte->nom = $request->ca['nom'];
        $producte->translateOrNew('ca')->nom = $request->ca['nom'];
        $producte->translateOrNew('es')->nom = $request->es['nom'];
        $producte->descripcio = $request->ca['descripcio'];
        $producte->translateOrNew('ca')->descripcio = $request->ca['descripcio'];
        $producte->translateOrNew('es')->descripcio = $request->es['descripcio'];
        $producte->preu = $request->preu;
        $producte->quantitat = $request->quantitat;        
        $producte->categoria_id = $request->categoria_id;
        if ($image = $request->file('imatge')) {

            $destinationPath = 'images/productes/';

            $profileImage = $request->ca['nom'] .'.'. $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$destinationPath$profileImage";
            
            $producte->imatge = $input['image'];

        }
        $producte->save();
        $productes = Productes::get();
        $categories = Categories::get();
        return view('administra.productes.index')
        ->with('categories', $categories)
        ->with('productes', $productes);
    }
    /**
     * Actualitza el producte
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producte = Productes::where('id', $id)->first();
        $productes = Productes::get();
        $categories = Categories::get();
        return view('administra.productes.edita')
        ->with('categories', $categories)
        ->with('editdata', $producte)
        ->with('productes', $productes);
    }
    /**
     * Borra el producte
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        //TODO borrar tambe les translations
        $producte = Productes::where('id', $id)->delete();
        $productes = Productes::get();
        $categories = Categories::get();
        return view('administra.productes.index')
        ->with('categories', $categories)
        ->with('productes', $productes);
    }
}
