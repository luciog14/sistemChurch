<?php

namespace App\Http\Controllers;

use App\Models\Madrina;
use Illuminate\Http\Request;

class MadrinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $madrinas=Madrina::all()->sortByDesc('id');
        return view('madrinas.index',['madrinas'=>$madrinas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('madrinas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $request->validate([
            'madrCedula'=>'required|numeric|max:9999999999',
            'madrNombre'=>'required',
            'madrApellido'=>'required',
            'madrTelefono'=>'required',
            'madrDireccion'=>'required',
        ]);

        // Verificar si la cédula ya está registrada
        $cedulaExistente = Madrina::where('madrCedula', $request->madrCedula)->exists();

        // Si la cédula existe, mostrar una alerta y redirigir
        if ($cedulaExistente) {
            // return redirect()->back()->with('mensaje', 'Cédula ya registrada');
            return redirect()->route('madrinas.index')->with('validarCedula', 'Persona ya esta registrada');
        }

        $cedula = $request->input('madrCedula');
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
                    $madrina=new Madrina();
                    $madrina->madrCedula=$request->madrCedula;
                    $madrina->madrNombre=$request->madrNombre;
                    $madrina->madrApellido=$request->madrApellido;
                    $madrina->madrTelefono=$request->madrTelefono;
                    $madrina->madrDireccion=$request->madrDireccion;
                    $madrina->saveOrFail();
                     return redirect()->route('madrinas.index')->with('mensaje','Se ha registrado correctamente');
                }else{
                    return redirect()->route('madrinas.create')->with('validarCedula', 'Cédula no válida');
                }
            }else{
                return redirect()->route('madrinas.create')->with('validarCedula', 'Cédula no válida');
            }
        }else{
            return redirect()->route('madrinas.create')->with('validarCedula', 'La cédula no tiene 10 dígitos');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $madrina=Madrina::findOrFail($id);
        return view('madrinas.show',['madrina'=>$madrina]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id){
        $madrina=Madrina::findOrFail($id);
        return view('madrinas.edit',['madrina'=>$madrina]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
        $request->validate([
            'madrCedula'=>'required',
            'madrNombre'=>'required',
            'madrApellido'=>'required',
            'madrTelefono'=>'required',
            'madrDireccion'=>'required',
        ]);

        $madrina=Madrina::find($id);

        $madrina->madrCedula=$request->madrCedula;
        $madrina->madrNombre=$request->madrNombre;
        $madrina->madrApellido=$request->madrApellido;
        $madrina->madrTelefono=$request->madrTelefono;
        $madrina->madrDireccion=$request->madrDireccion;

        $madrina->saveOrFail();

        return redirect()->route('madrinas.index')->with('mensaje', 'Actualizado correctamente');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id){

        $madrina = Madrina::with(['bautizos', 'confirmaciones', 'matrimonios'])->find($id);

        // Verificar si hay bautizos o confirmaciones relacionados con esta madre
        if ($madrina->bautizos->isEmpty() && $madrina->confirmaciones->isEmpty() && $madrina->matrimonios->isEmpty()) {
            // No hay bautizos o confirmaciones relacionados, se puede eliminar
            $madrina->delete();
            return redirect()->route('madrinas.index')->with('mensaje', 'Eliminado correctamente');
        } else {
            // Hay bautizos o confirmaciones relacionados, mostrar mensaje
            return redirect()->route('madrinas.index')->with('validarCedula', 'No se puede eliminar porque está asociada a un registro');
        }
    }
}
