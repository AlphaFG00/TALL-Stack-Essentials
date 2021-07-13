<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    #validacion si el usuario cuenta con un email verificado o no
    public function verify(Subscriber $subscriber)
    {
        if(!$subscriber->hasVerifiedEmail()){
            $subscriber->markEmailAsVerified();
        }

        return redirect('/?verified=1');
    }
}
