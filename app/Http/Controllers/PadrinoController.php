<?php

namespace App\Http\Controllers;

use App\Models\Padrino;
use Illuminate\Http\Request;

class PadrinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $padrino=Padrino::all()->sortByDesc('id');
        return view('padrinos.index',['padrinos'=>$padrino]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('padrinos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'padrCedula'=>'required',
            'padrNombre'=>'required',
            'padrApellido'=>'required',
            'padrTelefono'=>'required',
            'padrDireccion'=>'required',
        ]);

        // Verificar si la cédula ya está registrada
        $cedulaExistente = Padrino::where('padrCedula', $request->padrCedula)->exists();

        // Si la cédula existe, mostrar una alerta y redirigir
        if ($cedulaExistente) {
            // return redirect()->back()->with('validarCedula', 'Persona ya esta registrada');
            return redirect()->route('padrinos.index')->with('validarCedula', 'Persona ya esta registrada');
            // return back()->with('validarCedula', 'Persona ya está registrada');

        }

        $cedula = $request->input('padrCedula');
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
                    $padrino=new Padrino();
                    $padrino->padrCedula=$request->padrCedula;
                    $padrino->padrNombre=$request->padrNombre;
                    $padrino->padrApellido=$request->padrApellido;
                    $padrino->padrTelefono=$request->padrTelefono;
                    $padrino->padrDireccion=$request->padrDireccion;
                    $padrino->saveOrFail();
                    return redirect()->route('padrinos.index')->with('mensaje','Se ha registrado correctamente');
                }else{
                    return redirect()->route('padrinos.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                return redirect()->route('padrinos.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('padrinos.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $padrino=Padrino::findOrFail($id);
        return view('padrinos.show',['padrino'=>$padrino]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $padrino=Padrino::findOrFail($id);
        return view('padrinos.edit',['padrino'=>$padrino]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id){

        $request->validate([
            'padrCedula'=>'required',
            'padrNombre'=>'required',
            'padrApellido'=>'required',
            'padrTelefono'=>'required',
            'padrDireccion'=>'required',
        ]);

        $padrino=Padrino::find($id);

        $padrino->padrCedula=$request->padrCedula;
        $padrino->padrNombre=$request->padrNombre;
        $padrino->padrApellido=$request->padrApellido;
        $padrino->padrTelefono=$request->padrTelefono;
        $padrino->padrDireccion=$request->padrDireccion;

        $padrino->saveOrFail();

        return redirect()->route('matrimonios.index')->with('mensaje','Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $padrino = Padrino::with(['bautizos', 'confirmaciones', 'matrimonios'])->find($id);

        // Verificar si hay bautizos o confirmaciones relacionados con esta madre
        if ($padrino->bautizos->isEmpty() && $padrino->confirmaciones->isEmpty() && $padrino->matrimonios->isEmpty()) {
            // No hay bautizos o confirmaciones relacionados, se puede eliminar
            $padrino->delete();
            return redirect()->route('padrinos.index')->with('mensaje', 'Eliminado correctamente');
        } else {
            // Hay bautizos o confirmaciones relacionados, mostrar mensaje
            return redirect()->route('padrinos.index')->with('validarCedula', 'No se puede eliminar porque está asociada a un registro');
        }
    }
}
