<?php

namespace App\Http\Controllers;

use App\Models\Comandes;
use App\Models\ComandesProducte;
use App\Models\ComandesProductes;
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
        $comanda = new Comandes();
        $comanda->email = 'oriolrg@gmail.com';
        $comanda->direccio = 'oriolrg@gmail.com';
        $comanda->estat = 0;
        $comanda->save();
        foreach ($cartItems as $key => $value) {
            $producte = Productes::where('id', $value->id)->first();
            if($value->quantity <= $producte->quantitat){
                
                $comanda_producte = new ComandesProducte();
                $comanda_producte->comanda_id = $comanda->id;
                $comanda_producte->producte_id = $producte->id;
                $comanda_producte->quantitat = $value->quantity;
                $comanda_producte->save();
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
        $comanda->pagat =  $totalPagar;
        $comanda->save();
        $cartItems = CartFacade::getContent();
        session()->flash('success', 'Pagament realitzat Satisfactoriament !');
        return view('public.botiga.cart', compact('cartItems'));
    }


}
