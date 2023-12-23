<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de restablecimiento de contraseña
    |------------------------------------------------- -------------------------
    |
    | Este controlador es responsable de manejar las solicitudes de restablecimiento de contraseña.
    | y utiliza un rasgo simple para incluir este comportamiento. Eres libre de
    | Explore este rasgo y anule cualquier método que desee modificar.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
}
