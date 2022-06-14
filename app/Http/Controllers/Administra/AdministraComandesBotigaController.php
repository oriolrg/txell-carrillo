<?php

namespace App\Http\Controllers\Administra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as RoutingController;

class AdministraComandesBotigaController extends RoutingController
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        return view('administra.comandes.formulari');
    }
}
