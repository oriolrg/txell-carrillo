<?php

namespace App\Http\Controllers\Administra;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Comandes;
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
    public function show()
    {
        return view('administra.comandes.formulari');
    }
}
