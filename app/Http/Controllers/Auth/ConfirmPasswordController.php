<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ConfirmsPasswords;

class ConfirmPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Confirmar contraseña del controlador
    |------------------------------------------------- -------------------------
    |
    | Este controlador es responsable de manejar las confirmaciones de contraseña y
    | utiliza un rasgo simple para incluir el comportamiento. Eres libre de explorar
    | este rasgo y anula cualquier función que requiera personalización.
    |
    */

    use ConfirmsPasswords;

    /**
     * Dónde redirigir a los usuarios cuando falla la url prevista.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
}
