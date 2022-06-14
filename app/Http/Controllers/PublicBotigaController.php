<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Productes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as RoutingController;

class PublicBotigaController extends RoutingController
{
    public function index()
    {
        $categories = Categories::get();
        $productes = Productes::get();
        return view('public.botiga.welcomeBotiga')->with('categories', $categories)->with('productes', $productes);
    }
}
