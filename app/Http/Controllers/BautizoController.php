<?php

namespace App\Http\Controllers;

use App\Models\Bautizo;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Padre;
use App\Models\Madre;
use App\Models\Padrino;
use App\Models\Madrina;
use App\Models\Parroco;
use app\Models\User;



/**
 * Class BautizoController
 * @package App\Http\Controllers
 */
class BautizoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $bautizos = Bautizo::orderBy('created_at', 'desc')->paginate();

        return view('bautizo.index', compact('bautizos'))
            ->with('i', (request()->input('page', 1) - 1) * $bautizos->perPage());
    }



    public function certificadoBautismo($id) {

        // Obtén los datos del bautizo
        $bautizo = Bautizo::find($id);
        // Obtén el nombre del usuario autenticado
        $nombreUsuario = Auth::user()->name;
        $idUsuario = Auth::user()->id;


        // Carga solo la vista sin extender el diseño principal
        $view = View::make('bautizo.certificadoBautismo', compact('bautizo','nombreUsuario','idUsuario'))->render();

        // Crea una instancia de Dompdf
        $dompdf = new Dompdf();

        // Carga el HTML en Dompdf
        $dompdf->loadHtml($view);

        // Establece el tamaño del papel (puedes ajustarlo según tus necesidades)
        //$dompdf->setPaper('A5', 'landscape');//horizontal
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el PDF (puedes ajustar la calidad según tus necesidades)
        $dompdf->render();

        // Genera la salida del PDF (puedes ajustar la ubicación según tus necesidades)
        $dompdf->stream('certificado_bautismo.pdf', ['Attachment' => false]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $bautizo = new Bautizo();
        $padres = Padre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padNombre, ' ', padApellido)"), 'id');
        $madres = Madre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madNombre, ' ', madApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');
        return view('bautizo.create', compact('bautizo','padres','madres','padrinos','madrinas','parrocos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Bautizo::$rules);

        // Verificar si la cédula ya está registrada
        $cedulaExistente = Bautizo::where('bauCedula', $request->bauCedula)->exists();
        if ($cedulaExistente){
            return redirect()->route('bautizos.index')->with('validarCedula', 'Persona ya registrada');
        }

        $cedula = $request->input('bauCedula');
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

                    // Crear una nueva instancia de bautizo con los datos del formulario
                    $bautizo = Bautizo::create($request->all());
                    return redirect()->route('bautizos.index')->with('mensaje', 'Se ha registrado correctamente.');
                }
            }else{
                return redirect()->route('bautizos.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('bautizos.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

        $bautizo = Bautizo::find($id);
        $padres = Padre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padNombre, ' ', padApellido)"), 'id');
        $madres = Madre::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madNombre, ' ', madApellido)"), 'id');
        $padrinos=Padrino::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::orderBy('id', 'desc')->pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');

        return view('bautizo.show', compact('bautizo','padres','madres','padrinos','madrinas','parrocos'));
        // $bautizo = Bautizo::find($id);

        // return view('bautizo.show', compact('bautizo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bautizo = Bautizo::find($id);
        $padres = Padre::pluck(DB::raw("CONCAT(padNombre, ' ', padApellido)"), 'id');
        $madres = Madre::pluck(DB::raw("CONCAT(madNombre, ' ', madApellido)"), 'id');
        $padrinos=Padrino::pluck(DB::raw("CONCAT(padrNombre, ' ', padrApellido)"), 'id');
        $madrinas=Madrina::pluck(DB::raw("CONCAT(madrNombre, ' ', madrApellido)"), 'id');
        $parrocos=Parroco::pluck(DB::raw("CONCAT(parrNombre, ' ', parrApellido)"), 'id');

        return view('bautizo.edit', compact('bautizo','padres','madres','padrinos','madrinas','parrocos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Bautizo $bautizo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bautizo $bautizo)
    {
        request()->validate(Bautizo::$rules);

        $bautizo->update($request->all());

        return redirect()->route('bautizos.index')
            ->with('mensaje', 'Bautizo editado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bautizo = Bautizo::find($id)->delete();

        return redirect()->route('bautizos.index')
            ->with('mensaje', 'Bautizo eliminado correctamente');
    }
}
