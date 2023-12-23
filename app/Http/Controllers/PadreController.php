<?php

namespace App\Http\Controllers;


// use Illuminate\Contracts\Http\Kernel;
use App\Models\Padre;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PadreController extends Controller
{
    public function index(){
        $padres=Padre::all()->sortByDesc('id');
        return view('padres.index',['padres'=>$padres]);

    }
    public function create(){
        return view('padres.create');

    }
     public function store(Request $request){

        $request->validate([
            'padCedPas'=>'required|numeric|max:9999999999',
            'padNombre'=>'required',
            'padApellido'=>'required',
            'padEmail'=>'required',
            'padTelefono'=>'required',
            'padDireccion'=>'required',
            'padNacionalidad'=>'required',
        ]);
        // Verificar si la cédula ya está registrada
         $cedulaExistente = Padre::where('padCedPas', $request->padCedPas)->exists();

         // Si la cédula existe, mostrar una alerta y redirigir
         if ($cedulaExistente) {
             // return redirect()->back()->with('mensaje', 'Cédula ya registrada');
             return redirect()->route('padres.index')->with('validarCedula', 'Persona ya registrada');
         }

         $cedula = $request->input('padCedPas');
         //Preguntamos si la cedula consta de 10 digitos
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

                    $padre = new Padre();
                    $padre->padCedPas=$request->padCedPas;

                    $padre->padNombre=$request->padNombre;
                    $padre->padApellido=$request->padApellido;
                    $padre->padEmail=$request->padEmail;
                    $padre->padTelefono=$request->padTelefono;
                    $padre->padDireccion=$request->padDireccion;
                    $padre->padNacionalidad=$request->padNacionalidad;
                    $padre->saveOrFail();
                    return redirect()->route('padres.index')->with('mensaje', 'Se ha registrado correctamente');
                }else{
                    return redirect()->route('padres.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                return redirect()->route('padres.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('padres.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }


    }
    /**
     * Display the specified resource.
     */
    public function show($id){
        $padre=Padre::findOrFail($id);
        return view('padres.show',['padre'=>$padre]);
    }
     /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $padre=Padre::findOrFail($id);
        return view('padres.edit',['padre'=>$padre]);
    }
    public function update(Request $request, $id){

        $request->validate([
            'padCedPas'=>'required',
            'padNombre'=>'required',
            'padApellido'=>'required',
            'padEmail'=>'required',
            'padTelefono'=>'required',
            'padDireccion'=>'required',
            'padNacionalidad'=>'required',
        ]);

        $padre = Padre::find($id);

        $padre->padCedPas=$request->padCedPas;
        $padre->padNombre=$request->padNombre;
        $padre->padApellido=$request->padApellido;
        $padre->padEmail=$request->padEmail;
        $padre->padTelefono=$request->padTelefono;
        $padre->padDireccion=$request->padDireccion;
        $padre->padNacionalidad=$request->padNacionalidad;

        $padre->saveOrFail();
        return redirect()->route('padres.index')->with('mensaje', 'Actualizado correctamente');
    }

    public function destroy($id)
    {
        $padre = Padre::with(['bautizos', 'confirmaciones'])->find($id);

        // Verificar si hay bautizos o confirmaciones relacionados con esta madre
        if ($padre->bautizos->isEmpty() && $padre->confirmaciones->isEmpty()) {
            // No hay bautizos o confirmaciones relacionados, se puede eliminar
            $padre->delete();
            return redirect()->route('padres.index')->with('mensaje', 'Eliminada correctamente');
        } else {
            // Hay bautizos o confirmaciones relacionados, mostrar mensaje
            return redirect()->route('padres.index')->with('validarCedula', 'No se puede eliminar porque está asociada a un bautizo o confirmación');
        }
    }

}
