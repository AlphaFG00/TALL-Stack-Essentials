<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    #2.- creando metodo all para listar todos los subsciptores
    public function all()
    {
        #enviando lista de subsciptores
        return view('subscribers.all')->with([
            'subscribers' => Subscriber::all(),
        ]);
    }
    #validacion si el usuario cuenta con un email verificado o no
    public function verify(Subscriber $subscriber)
    {
        if(!$subscriber->hasVerifiedEmail()){
            $subscriber->markEmailAsVerified();
        }

        return redirect('/?verified=1');
    }
}
