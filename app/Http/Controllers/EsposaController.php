<?php

namespace App\Http\Controllers;

use App\Models\Esposa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EsposaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $esposas=Esposa::all()->sortByDesc('id');
        return view('esposas.index',['esposas'=>$esposas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('esposas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'wifCedula'=>'required|numeric|max:9999999999',
            'wifNombre'=>'required',
            'wifApellido'=>'required',
            'wifEmail'=>'required',
            'wifTelefono'=>'required',
            'wifDireccion'=>'required',
        ]);

        // Verificar si la cédula ya está registrada
        $cedulaExistente = Esposa::where('wifCedula', $request->wifCedula)->exists();

        // Si la cédula existe, mostrar una alerta y redirigir
        if ($cedulaExistente) {
            // return redirect()->back()->with('mensaje', 'Cédula ya registrada');
            return redirect()->route('matrimonios.index')->with('validarCedula', 'Esta cédula ya esta registrada');
        }

        $cedula = $request->input('wifCedula');
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
                    $esposa = new Esposa();
                    $esposa->wifCedula = $request->wifCedula;
                    $esposa->wifNombre = $request->wifNombre;
                    $esposa->wifApellido = $request->wifApellido;
                    $esposa->wifEmail = $request->wifEmail;
                    $esposa->wifTelefono = $request->wifTelefono;
                    $esposa->wifDireccion = $request->wifDireccion;

                    $esposa->saveOrFail();

                    return redirect()->route('matrimonios.index')->with('mensaje', 'Se ha registrado correctamente');
                }else{
                    return redirect()->route('esposas.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                return redirect()->route('esposas.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('esposas.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }

    }


    /**
     * Display the specified resource.
     */
    public function show($id){
        $esposa=Esposa::findOrFail($id);
        return view('esposas.show',['esposa'=>$esposa]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $esposa=Esposa::findOrFail($id);
        return view('esposas.edit',['esposa'=>$esposa]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'wifCedula'=>'required',
            'wifNombre'=>'required',
            'wifApellido'=>'required',
            'wifEmail'=>'required',
            'wifTelefono'=>'required',
            'wifDireccion'=>'required',
        ]);

        $esposa=Esposa::find($id);

        $esposa->wifCedula = $request->wifCedula;
        $esposa->wifNombre = $request->wifNombre;
        $esposa->wifApellido = $request->wifApellido;
        $esposa->wifEmail = $request->wifEmail;
        $esposa->wifTelefono = $request->wifTelefono;
        $esposa->wifDireccion = $request->wifDireccion;

        $esposa->saveOrFail();

        return redirect()->route('esposas.index')->with('mensaje', 'Actualizado correctamente');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $esposa = Esposa::with('matrimonios')->find($id);

        // Verificar si hay matrimonios relacionados con esta esposa
        if ($esposa->matrimonios->isEmpty()) {

            // No hay matrimonios relacionados, se puede eliminar
            $esposa->delete();

            return redirect()->route('esposas.index')->with('mensaje', 'Eliminada correctamente');
        } else {
            // Hay matrimonios relacionados, mostrar mensaje
            return redirect()->route('esposas.index')->with('validarCedula', 'No se puede eliminar porque esta asociada a un matrimonio');
        }
    }
}
