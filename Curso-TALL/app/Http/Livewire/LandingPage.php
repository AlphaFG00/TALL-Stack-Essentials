<?php

namespace App\Http\Livewire;

use App\Models\Subscriber;
use Livewire\Component;

class LandingPage extends Component
{
    #agregando atributo email
    public $email;

    #agregando validaciones
    protected $rules = [
        'email' => 'required|email:filter|unique:subscribers,email',

    ];

    #creando funcion para suscribir
    public function subscribe()
    {
        $this->validate();
        #insercion en la base de datos
        $subscriber = Subscriber::create([
            'email' => $this->email,
        ]);
        $this->reset('email');
    }
    public function render()
    {
        return view('livewire.landing-page');
    }
}
