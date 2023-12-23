<?php

namespace App\Http\Controllers;

use App\Models\Confirmacione;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use App\Models\Padre;
use App\Models\Madre;
use App\Models\Padrino;
use App\Models\Madrina;
use App\Models\Parroco;
use app\Models\User;

/**
 * Class ConfirmacioneController
 * @package App\Http\Controllers
 */
class ConfirmacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function certConfir($id) {

        // Obtén los datos del confirmaciones
        $confirmacione = Confirmacione::find($id);
        // Obtén el nombre del usuario autenticado
        $nombreUsuario = Auth::user()->name;
        $idUsuario = Auth::user()->id;

        // Carga solo la vista sin extender el diseño principal
        $view = View::make('confirmacione.certConfir', compact('confirmacione','nombreUsuario','idUsuario'))->render();

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($view);

        // Establece el tamaño del papel (puedes ajustarlo según tus necesidades)
        // $dompdf->setPaper('A5', 'landscape');//horizontal
        $dompdf->setPaper('A4', 'portrait');//vertical

        // Renderiza el PDF (puedes ajustar la calidad según tus necesidades)
        $dompdf->render();

        // Genera la salida del PDF (puedes ajustar la ubicación según tus necesidades)
        $dompdf->stream('certificado_confirmacion.pdf', ['Attachment' => false]);
    }


     public function index(){

        $confirmaciones = Confirmacione::orderBy('created_at', 'desc')->paginate();

        return view('confirmacione.index', compact('confirmaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $confirmaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $confirmacione = new Confirmacione();
        $padres=Padre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padNombre, ' ', padApellido)"), 'id');
        $madres=Madre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madNombre, ' ', madApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');
        return view('confirmacione.create', compact('confirmacione','padres','madres','padrinos','madrinas','parrocos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        //Validar las reglas
        request()->validate(Confirmacione::$rules);

        // Verificar si la cédula ya está registrada
        $cedulaExistente = Confirmacione::where('confCedula', $request->confCedula)->exists();

        // Si la cédula existe, mostrar una alerta y redirigir
        if ($cedulaExistente) {
            return redirect()->route('confirmaciones.index')->with('EsposExist', 'Persona ya registrada');
        }
        // Obtener el valor del campo "cedula"
        $cedula = $request->input('confCedula');
        if(strlen($cedula) == 10){

            // Verificar el código de la provincia (los dos primeros dígitos)
            $codigoProvincia = substr($cedula, 0, 2);

            if ($codigoProvincia >= 1 && $codigoProvincia <= 24) {

                // Extraer el último dígito (dígito verificador)
                $digitoVerificador = substr($cedula, 9, 1);

                // Sumar los dígitos pares
                $pares = 0;
                for ($i = 1; $i < 8; $i += 2) {
                    $pares += intval($cedula[$i]);
                }

                // Sumar los dígitos impares multiplicados por 2
                $impares = 0;
                for ($i = 0; $i < 9; $i += 2) {
                    $doble = intval($cedula[$i]) * 2;
                    $impares += ($doble > 9) ? $doble - 9 : $doble;
                }

                // Sumar los resultados obtenidos
                $sumaTotal = $pares + $impares;

                // Obtener la decena superior más próxima
                $decenaSuperior = ceil($sumaTotal / 10) * 10;

                // Obtener el dígito verificador esperado
                $digitoEsperado = $decenaSuperior - $sumaTotal;

                // Comparar el dígito verificador calculado con el ingresado
                if ($digitoEsperado == $digitoVerificador) {
                    $confirmacione = Confirmacione::create($request->all());
                    return redirect()->route('confirmaciones.index')->with('mensaje','Se ha registrado correctamente');
                }else{
                    return redirect()->route('confirmaciones.create')->with('validarCedula', 'Cédula no válida');
                }

            }else{
                return redirect()->route('confirmaciones.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('confirmaciones.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $confirmacione = Confirmacione::find($id);

        return view('confirmacione.show', compact('confirmacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $confirmacione = Confirmacione::find($id);
        $padres=Padre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padNombre, ' ', padApellido)"), 'id');
        $madres=Madre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madNombre, ' ', madApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');

        return view('confirmacione.edit', compact('confirmacione','padres','madres','padrinos','madrinas','parrocos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Confirmacione $confirmacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Confirmacione $confirmacione)
    {
        request()->validate(Confirmacione::$rules);

        $confirmacione->update($request->all());

        return redirect()->route('confirmaciones.index')
            ->with('mensale', 'Confirmacion actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $confirmacione = Confirmacione::find($id)->delete();

        return redirect()->route('confirmaciones.index')
            ->with('mensaje', 'Confirmacion eliminado con éxito');
    }
}
