<?php

namespace App\Http\Controllers;

use App\Models\Madre;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class MadreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $madres=Madre::all()->sortByDesc('id');
        return  view('madres.index',['madres'=>$madres]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('madres.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        $request->validate([
            'madCedPas'=>'required|numeric|max:9999999999',
            'madNombre'=>'required',
            'madApellido'=>'required',
            'madEmail'=>'required',
            'madTelefono'=>'required',
            'madDireccion'=>'required',
            'madNacionalidad'=>'required',
        ]);
        // Verificar si la cédula ya está registrada
         $cedulaExistente = Madre::where('madCedPas', $request->madCedPas)->exists();

         // Si la cédula existe, mostrar una alerta y redirigir
         if ($cedulaExistente) {
             // return redirect()->back()->with('mensaje', 'Cédula ya registrada');
             return redirect()->route('madres.index')->with('validarCedula', 'Persona ya registrada');
         }

        $cedula = $request->input('madCedPas');
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
                    $madre = new Madre();
                    $madre->madCedPas=$request->madCedPas;
                    $madre->madNombre=$request->madNombre;
                    $madre->madApellido=$request->madApellido;
                    $madre->madEmail=$request->madEmail;
                    $madre->madTelefono=$request->madTelefono;
                    $madre->madDireccion=$request->madDireccion;
                    $madre->madNacionalidad=$request->madNacionalidad;

                    $madre->saveOrFail();
                    return redirect()->route('madres.index')->with('mensaje', 'Se ha registrado correctamente');
                }else{
                    return redirect()->route('madres.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                return redirect()->route('madres.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('madres.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $madre=Madre::findOrFail($id);
        return view('madres.show',['madre'=>$madre]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $madre=Madre::findOrFail($id);
        return view('madres.edit',['madre'=>$madre]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){

        $request->validate([
            'madCedPas'=>'required',
            'madNombre'=>'required',
            'madApellido'=>'required',
            'madEmail'=>'required',
            'madTelefono'=>'required',
            'madDireccion'=>'required',
            'madNacionalidad'=>'required',
        ]);

        $madre = Madre::find($id);

        $madre->madCedPas=$request->madCedPas;
        $madre->madNombre=$request->madNombre;
        $madre->madApellido=$request->madApellido;
        $madre->madEmail=$request->madEmail;
        $madre->madTelefono=$request->madTelefono;
        $madre->madDireccion=$request->madDireccion;
        $madre->madNacionalidad=$request->madNacionalidad;

        $madre->saveOrFail();
        return redirect()->route('madres.index')->with('mensaje', 'Se ha actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

    $madre = Madre::with(['bautizos', 'confirmaciones'])->find($id);

    // Verificar si hay bautizos o confirmaciones relacionados con esta madre
    if ($madre->bautizos->isEmpty() && $madre->confirmaciones->isEmpty()) {
        // No hay bautizos o confirmaciones relacionados, se puede eliminar
        $madre->delete();
        return redirect()->route('madres.index')->with('mensaje', 'Eliminada correctamente');
    } else {
        // Hay bautizos o confirmaciones relacionados, mostrar mensaje
        return redirect()->route('madres.index')->with('validarCedula', 'No se puede eliminar porque está asociada a un bautizo o confirmación');
    }
}

}
