<?php

namespace App\Http\Controllers;

use App\Models\Esposo;
use Illuminate\Http\Request;

class EsposoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $esposos=Esposo::all()->sortByDesc('id');
        return view('esposos.index',['esposos'=>$esposos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return  view('esposos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'husCedula'=>'required|numeric||max:9999999999',
            'husNombre'=>'required',
            'husApellido'=>'required',
            'husEmail'=>'required',
            'husTelefono'=>'required',
            'husDireccion'=>'required',
        ]);

         // Verificar si la cédula ya está registrada
         $cedulaExistente = Esposo::where('husCedula', $request->husCedula)->exists();

         // Si la cédula existe, mostrar una alerta y redirigir
         if ($cedulaExistente) {
             // return redirect()->back()->with('mensaje', 'Cédula ya registrada');
             return redirect()->route('matrimonios.index')->with('validarCedula', 'Esta cédula ya esta registrada');
         }

        $cedula = $request->input('husCedula');
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

                     // Si la cédula no existe, continuar con el registro
                    $esposo = new Esposo();
                    $esposo->husCedula = $request->husCedula;
                    $esposo->husNombre = $request->husNombre;
                    $esposo->husApellido = $request->husApellido;
                    $esposo->husEmail = $request->husEmail;
                    $esposo->husTelefono = $request->husTelefono;
                    $esposo->husDireccion = $request->husDireccion;
                    $esposo->saveOrFail();
                    return redirect()->route('matrimonios.index')->with('mensaje', 'Se ha registrado correctamente');
                }else{
                    return redirect()->route('esposos.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                 return redirect()->route('esposos.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
             return redirect()->route('esposos.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $esposo=Esposo::findOrFail($id);
        return view('esposos.show',['esposo'=>$esposo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $esposo=Esposo::findOrFail($id);
        return view('esposos.edit',['esposo'=>$esposo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){

        $request->validate([
            'husCedula'=>'required',
            'husNombre'=>'required',
            'husApellido'=>'required',
            'husEmail'=>'required',
            'husTelefono'=>'required',
            'husDireccion'=>'required',
        ]);

        $esposo=Esposo::find($id);

        $esposo->husCedula = $request->husCedula;
        $esposo->husNombre = $request->husNombre;
        $esposo->husApellido = $request->husApellido;
        $esposo->husEmail = $request->husEmail;
        $esposo->husTelefono = $request->husTelefono;
        $esposo->husDireccion = $request->husDireccion;

        $esposo->saveOrFail();

        return redirect()->route('matrimonios.index')->with('mensaje', 'Se ha registrado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){
        $esposo = Esposo::with('matrimonios')->find($id);

        // Verificar si hay matrimonios relacionados con esta esposa
        if ($esposo->matrimonios->isEmpty()) {

            // No hay matrimonios relacionados, se puede eliminar
            $esposo->delete();

            return redirect()->route('esposos.index')->with('mensaje', 'Eliminado correctamente');
        } else {
            // Hay matrimonios relacionados, mostrar mensaje
            return redirect()->route('esposos.index')->with('validarCedula', 'No se puede eliminar porque esta asociado a un matrimonio');
        }
    }
}
