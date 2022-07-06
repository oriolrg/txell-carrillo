<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productes;
use Darryldecode\Cart\Facades\CartFacade;
use Illuminate\Routing\Controller as RoutingController;


class CartController extends RoutingController
{
    public function cartList()
    {
        $cartItems = CartFacade::getContent();
        foreach ($cartItems as $key => $value) {
            $value['estoc'] = Productes::where('id', $value->id)->first()->quantitat;
        }
        // dd($cartItems);
        return view('public.botiga.cart', compact('cartItems'));
    }


    public function addToCart(Request $request)
    {
        CartFacade::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->imatge,
            )
        ]);
        session()->flash('success', 'Producte afegit Satisfactoriament !');

        return redirect()->route('botiga.cart.list');
    }

    public function updateCart(Request $request)
    {
        CartFacade::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Producte actualitzat Satisfactoriament !');

        return redirect()->route('botiga.cart.list');
    }

    public function removeCart(Request $request)
    {
        CartFacade::remove($request->id);
        session()->flash('success', 'Producte borrat Satisfactoriament !');

        return redirect()->route('botiga.cart.list');
    }

    public function clearAllCart()
    {
        CartFacade::clear();

        session()->flash('success', 'Carret buidat Satisfactoriament !');

        return redirect()->route('botiga.cart.list');
    }
    public function getItemsCart(){
        return CartFacade::getContent();
    }
}
