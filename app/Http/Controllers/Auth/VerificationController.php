<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de verificación de correo electrónico
    |------------------------------------------------- -------------------------
    |
    | Este controlador es responsable de manejar la verificación por correo electrónico para cualquier
    | usuario que se registró recientemente en la aplicación. Los correos electrónicos también pueden
    | reenviarse si el usuario no recibió el mensaje de correo electrónico original.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
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
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
