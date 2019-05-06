<?php

namespace App\Providers;

use App\User;
use App\Alerta;
use App\Mail\CreacionUsuario;
use App\Mail\CorreoAlertaAdmin;
use App\Mail\CorreoUsuarioCambiado;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Tamaño por defecto de las cadenas de caracteres de 191
        //Problema de compatibilidad con motores de BD antiguos de mysql y mariadb
        Schema::defaultStringLength(191);

        //Envía el correo al usuario creado
        User::created(function($user){
            //Retry sirve para reenviar el correo en caso de que falle el envío
            //tendrá 5 intentos que se ejecutarán cada 100 milisegundos entre cada intento
            retry(5, function() use ($user){
                Mail::to($user->correo)->send(new CreacionUsuario($user));
            }, 100);
        });

        //Se envía el correo solo si ha cambiado el correo antiguo
        User::updated(function($user){
            if($user->isDirty('correo')){
                retry(5, function() use ($user){
                    Mail::to($user->correo)->send(new CorreoUsuarioCambiado($user));
                }, 100);
            }
        });

        //Se enviará un correo solo a los administradores sobre una alerta nueva
        Alerta::created(function($alerta){
            $admins = User::where('admin', 'true')->pluck('correo');

            retry(5, function() use ($alerta, $admins){
                Mail::to($admins)->send(new CorreoAlertaAdmin($alerta));
            }, 100);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
