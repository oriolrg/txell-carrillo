<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Productes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Controller as RoutingController;

class PublicBotigaController extends RoutingController
{
    public function index()
    {
        $categories = Categories::get();
        $productes = Productes::get();
        return view('public.botiga.welcomeBotiga')->with('categories', $categories)->with('productes', $productes);
    }
    public function indexProducte($producte)
    {
        $categories = Categories::get();
        $producte = Productes::where('id', $producte)->get();
        return view('public.botiga.producteBotiga')->with('categories', $categories)->with('producte', $producte);
    }
    public function getProductes()
    {
        $productes = new Collection();
        $productes['categories'] = Categories::get();
        //$productes['productes'] = Productes::where('quantitat', '>',0)->get();
        $productes['productes'] = Productes::get();
        foreach ($productes['productes'] as $key => $value) {
            $value->categoria_nom = Categories::where('id',$value->categoria_id)->first()->nom;
        }
        return $productes;
    }
    public function getProductesCategoria($id)
    {
        $productes = new Collection();
        $productes['categories'] = Categories::get();
        $productes['productes'] = Productes::where('categoria_id',$id)->get();
        foreach ($productes['productes'] as $key => $value) {
            $value->categoria_nom = Categories::where('id',$value->categoria_id)->first()->nom;
        }
        return $productes;
    }
}
