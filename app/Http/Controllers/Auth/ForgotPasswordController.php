<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Controlador de restablecimiento de contraseña
    |------------------------------------------------- -------------------------
    |
    | Este controlador es responsable de manejar los correos electrónicos de restablecimiento de contraseña y
    | incluye un rasgo que ayuda a enviar estas notificaciones desde
    | su aplicación a sus usuarios. Siéntete libre de explorar este rasgo.
    |
    */

    use SendsPasswordResetEmails;
}
