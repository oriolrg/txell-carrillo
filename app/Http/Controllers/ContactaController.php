<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Productes;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Routing\Controller as RoutingController;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendingEmail;

class ContactaController extends RoutingController
{
    public function email(Request $request)
    {
        if($request->checkbox == 'on'){
            $data = array(
                'name' => $request->name,
                'message' => $request->missatge,
                'email' => $request->email
            );
            Mail::to('calapatots@gmail.com')->send(new sendingEmail($data));
            return back()->with('missatge', 'Thanks for contacting us!');
        }else{
            return view('public.welcome')->with('missatge',"Accepta la política de privacitat");
        }
        
    }
}
