<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productes;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Routing\Controller as RoutingController;


class PagamentController extends RoutingController
{
    public function pagarCart(Request $request)
    {
        $totalPagar = 0;
        $cartItems = CartFacade::getContent();
        foreach ($cartItems as $key => $value) {
            $producte = Productes::where('id', $value->id)->first();
            if($value->quantity <= $producte->quantitat){
                $producte->quantitat = $producte->quantitat - $value->quantity;
                $producte->save();
                $totalPagar += $value->price * $value->quantity;
                $value['estoc'] = $producte->quantitat;
            }else{
                session()->flash('success', 'No hi ha suficent estoc de '.$value->nom);
                return view('public.botiga.cart', compact('cartItems'));
            }
            
        }
        CartFacade::clear();
        $cartItems = CartFacade::getContent();
        session()->flash('success', 'Pagament realitzat Satisfactoriament !');
        return view('public.botiga.cart', compact('cartItems'));
    }


}
