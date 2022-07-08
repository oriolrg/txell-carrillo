<?php

namespace App\Http\Controllers\Administra;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comandes;
use App\Models\ComandesProducte;
use App\Models\Productes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as RoutingController;

class AdministraComandesBotigaController extends RoutingController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->productes = Productes::get();
        $this->categories = Categories::get();
        $this->comandes_pendents = Comandes::where('estat', 0)->get();
    }
    public function getComandesPendents()
    {
        foreach ($this->comandes_pendents as $key => $value) {
            $value->comanda_producte = ComandesProducte::where('comanda_id', $value->id)->get();
            foreach ($value->comanda_producte as $key => $comanda_producte) {
                $comanda_producte['producte'] = $comanda_producte->producte()->first();
            }
        }

        //return $this->comandes_pendents;
        return view('administra.comandes.index')
        ->with('comandes_pendents', $this->comandes_pendents)
        ->with('categories', $this->categories)
        ->with('productes', $this->productes);
    }
    public function setComandaTramitada($id){
        $comanda = Comandes::where('id', $id)->first();
        $comanda->estat = 1;
        $comanda->save();
        $this->productes = Productes::get();
        $this->categories = Categories::get();
        $this->comandes_pendents = Comandes::where('estat', 0)->get();
        return redirect()->route('administra.comandes.pendents')
        ->with('comandes_pendents', $this->comandes_pendents)
        ->with('categories', $this->categories)
        ->with('productes', $this->productes);
    }
    public function getComandesTramitades()
    {
        $comandes_tramitades = Comandes::where('estat', 1)->get();
        foreach ($comandes_tramitades as $key => $value) {
            $value->comanda_producte = ComandesProducte::where('comanda_id', $value->id)->get();
            foreach ($value->comanda_producte as $key => $comanda_producte) {
                $comanda_producte['producte'] = $comanda_producte->producte()->first();
            }
        }

        //return $this->comandes_pendents;
        return view('administra.comandes.indexTramitades')
        ->with('comandes_pendents', $comandes_tramitades)
        ->with('categories', $this->categories)
        ->with('productes', $this->productes);
    }
}
