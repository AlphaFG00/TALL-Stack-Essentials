<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Illuminate\Auth\Notifications\VerifyEmail;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;



class LandingPage extends Component
{
    #agregando atributo email
    public $email;
    #entangle para los x modal
    public $showSubscribe = false;
    public $showSuccess = false;

    #agregando validaciones
    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email',

    ];

    #funcion de mount para poder cambiar el showsuccess a true
    public function mount(Request $request)
    {
        if($request->has('verified') && $request->verified == 1)
        {
            $this->showSuccess = true;
        }

    }

    #creando funcion para suscribir
    public function subscribe()
    {
        $this->validate();

        DB::transaction(function () {
            #insercion en la base de datos
            $subscriber = Subscriber::create([
                'email' => $this->email,
            ]);

            #ya son varias operaciones para la base de datos
            # es conveniente ponerlas dentro de un DB transaction()
            $notification = new VerifyEmail;

            #personalizacion de proceso de verificacion de correo,
            #estableciendo una ruta firmada personalizada
            $notification::createUrlUsing(function($notifiable){
                return URL::temporarySignedRoute(
                    'subscribers.verify',
                    now()->addMinutes(30),
                    [
                        #solo la persona que lo recibiio puede verificar el correo
                        'subscriber' => $notifiable->getKey(),
                    ]
                );
            });

            $subscriber->notify($notification);

        }, $intentos_insercion = 5 );

        $this->reset('email');
        $this->showSubscribe = false;
        $this->showSuccess = true;
    }
    public function render()
    {
        return view('livewire.landing-page');
    }
}
