<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LandingPage extends Component
{
    #agregando atributo email
    public $email;

    #creando funcion para suscribir
    public function subscribe()
    {
        \Log::debug($this->email);
    }
    public function render()
    {
        return view('livewire.landing-page');
    }
}
