<?php
use App\Http\Controllers\SubscriberController;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

//1.- Crear la ruta
                        //controlador    como clase   nombre del metodo
Route::get('subscribers',[SubscriberController::class, 'all'])
    //ruta
    ->name('subscribers.all');
